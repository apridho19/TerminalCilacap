<?php

namespace App\Http\Controllers;

use App\Models\DataProduksi;
use App\Models\DataMaster;
use App\Exports\DataProduksiExport;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class DataProduksiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai filter dari request
        $jenisTrayek = $request->input('jenis_trayek');
        $asalTujuan = $request->input('asal_tujuan');
        $provinsi = $request->input('provinsi');
        $terminalTujuan = $request->input('terminal_tujuan');
        $kabupaten = $request->input('kabupaten');

        // Query dengan filter
        $query = DataProduksi::with('dataMaster');

        // Apply filter berdasarkan data master
        if ($jenisTrayek) {
            $query->whereHas('dataMaster', function ($q) use ($jenisTrayek) {
                $q->where('jenis_trayek', $jenisTrayek);
            });
        }

        if ($asalTujuan) {
            $query->whereHas('dataMaster', function ($q) use ($asalTujuan) {
                $q->where('asal_tujuan', $asalTujuan);
            });
        }

        if ($provinsi) {
            $query->whereHas('dataMaster', function ($q) use ($provinsi) {
                $q->where('provinsi', $provinsi);
            });
        }

        if ($terminalTujuan) {
            $query->whereHas('dataMaster', function ($q) use ($terminalTujuan) {
                $q->where('terminal_tujuan', $terminalTujuan);
            });
        }

        if ($kabupaten) {
            $query->whereHas('dataMaster', function ($q) use ($kabupaten) {
                $q->where('kabupaten', $kabupaten);
            });
        }

        // Ambil semua data produksi dengan relasi data master
        $allData = $query->orderBy('created_at', 'desc')->get();

        // Ambil data unik untuk filter dropdown
        $filterData = DataMaster::select('jenis_trayek', 'asal_tujuan', 'provinsi', 'terminal_tujuan', 'kabupaten')
            ->distinct()
            ->get();

        $jenisTrayekList = $filterData->pluck('jenis_trayek')->unique()->sort()->values();
        $asalTujuanList = $filterData->pluck('asal_tujuan')->unique()->sort()->values();
        $provinsiList = $filterData->pluck('provinsi')->unique()->sort()->values();
        $terminalTujuanList = $filterData->pluck('terminal_tujuan')->unique()->sort()->values();
        $kabupatenList = $filterData->pluck('kabupaten')->unique()->sort()->values();

        // PENDEKATAN BARU: Group semua data berdasarkan no_kendaraan dulu
        $groupedByKendaraan = $allData->groupBy('no_kendaraan');
        $dataProduksi = [];

        foreach ($groupedByKendaraan as $noKendaraan => $dataGroup) {
            // Pisahkan data keberangkatan dan kedatangan untuk kendaraan ini
            $keberangkatan = $dataGroup->filter(function ($item) {
                return $item->waktu_berangkat && !$item->waktu_datang;
            })->sortBy(function ($item) {
                return strtotime($item->bus_berangkat . ' ' . $item->waktu_berangkat);
            })->values();

            $kedatangan = $dataGroup->filter(function ($item) {
                return $item->waktu_datang && !$item->waktu_berangkat;
            })->sortBy(function ($item) {
                return strtotime($item->bus_datang . ' ' . $item->waktu_datang);
            })->values();

            $lengkap = $dataGroup->filter(function ($item) {
                return $item->waktu_berangkat && $item->waktu_datang;
            });

            // Tambahkan data yang sudah lengkap
            foreach ($lengkap as $item) {
                $dataProduksi[] = $item;
            }

            // Pairing keberangkatan dengan kedatangan terdekat
            $usedKedatanganIds = [];

            foreach ($keberangkatan as $berangkat) {
                $bestMatch = null;
                $shortestTimeDiff = null;

                foreach ($kedatangan as $datang) {
                    // Skip jika kedatangan sudah dipakai
                    if (in_array($datang->id, $usedKedatanganIds)) {
                        continue;
                    }

                    $berangkatTime = strtotime($berangkat->bus_berangkat . ' ' . $berangkat->waktu_berangkat);
                    $datangTime = strtotime($datang->bus_datang . ' ' . $datang->waktu_datang);
                    $timeDiff = abs($datangTime - $berangkatTime);

                    // Cari yang terdekat dalam 48 jam
                    if ($timeDiff <= 172800 && ($shortestTimeDiff === null || $timeDiff < $shortestTimeDiff)) {
                        $shortestTimeDiff = $timeDiff;
                        $bestMatch = $datang;
                    }
                }

                // Jika ada pasangan, gabungkan
                if ($bestMatch) {
                    $combined = (object)[
                        'id' => $berangkat->id,
                        'data_master_id' => $berangkat->data_master_id,
                        'no_kendaraan' => $berangkat->no_kendaraan,
                        'dataMaster' => $berangkat->dataMaster,
                        'jml_pnp_berangkat' => $berangkat->jml_pnp_berangkat,
                        'waktu_berangkat' => $berangkat->waktu_berangkat,
                        'bus_berangkat' => $berangkat->bus_berangkat,
                        'jml_pnp_datang' => $bestMatch->jml_pnp_datang,
                        'waktu_datang' => $bestMatch->waktu_datang,
                        'bus_datang' => $bestMatch->bus_datang,
                        'created_at' => $berangkat->created_at,
                    ];
                    $dataProduksi[] = $combined;
                    $usedKedatanganIds[] = $bestMatch->id;
                } else {
                    // Keberangkatan tanpa kedatangan
                    $dataProduksi[] = $berangkat;
                }
            }

            // Tambahkan kedatangan yang tidak ter-pair
            foreach ($kedatangan as $datang) {
                if (!in_array($datang->id, $usedKedatanganIds)) {
                    $dataProduksi[] = $datang;
                }
            }
        }

        // Hitung total bus berangkat dan datang per hari
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));

        // Total bus berangkat hari ini (berdasarkan tanggal berangkat)
        $totalBusBerangkatHariIni = DataProduksi::whereNotNull('waktu_berangkat')
            ->whereDate('bus_berangkat', $today)
            ->count();

        // Total bus datang hari ini = sama dengan bus berangkat hari ini
        // Karena setiap keberangkatan pasti di-pair dengan kedatangan sebelumnya
        $totalBusDatangHariIni = $totalBusBerangkatHariIni;

        // Total penumpang berangkat hari ini
        $totalPenumpangBerangkatHariIni = DataProduksi::whereNotNull('waktu_berangkat')
            ->whereDate('bus_berangkat', $today)
            ->sum('jml_pnp_berangkat');

        // Total penumpang datang hari ini = ambil dari kedatangan yang di-pair dengan keberangkatan hari ini
        $keberangkatanHariIni = DataProduksi::whereNotNull('waktu_berangkat')
            ->whereDate('bus_berangkat', $today)
            ->get();

        $totalPenumpangDatangHariIni = 0;
        foreach ($keberangkatanHariIni as $berangkat) {
            $kedatangan = DataProduksi::where('no_kendaraan', $berangkat->no_kendaraan)
                ->whereNotNull('waktu_datang')
                ->whereNull('waktu_berangkat')
                ->where('bus_datang', '<=', $berangkat->bus_berangkat)
                ->orderBy('bus_datang', 'desc')
                ->first();

            if ($kedatangan) {
                $totalPenumpangDatangHariIni += $kedatangan->jml_pnp_datang ?? 0;
            }
        }

        // Implementasi pagination manual untuk array
        $page = $request->get('page', 1);
        $perPage = 30;
        $offset = ($page - 1) * $perPage;

        $dataProduksiCollection = collect($dataProduksi);
        $totalItems = $dataProduksiCollection->count();

        $dataProduksiPaginated = new LengthAwarePaginator(
            $dataProduksiCollection->slice($offset, $perPage)->values(),
            $totalItems,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('sistem_informasi.data_produksi.index', compact(
            'dataProduksi',
            'dataProduksiPaginated',
            'jenisTrayekList',
            'asalTujuanList',
            'provinsiList',
            'terminalTujuanList',
            'kabupatenList',
            'jenisTrayek',
            'asalTujuan',
            'provinsi',
            'terminalTujuan',
            'kabupaten',
            'totalBusBerangkatHariIni',
            'totalBusDatangHariIni',
            'totalPenumpangBerangkatHariIni',
            'totalPenumpangDatangHariIni'
        ));
    }

    public function export(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2020|max:2100',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $jenisTrayek = $request->jenis_trayek;
        $provinsi = $request->provinsi;
        $kabupaten = $request->kabupaten;
        $terminalTujuan = $request->terminal_tujuan;

        $bulanNama = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $fileName = 'Data_Produksi_' . $bulanNama[$bulan] . '_' . $tahun;

        // Tambahkan filter ke nama file jika ada
        if ($jenisTrayek) {
            $fileName .= '_' . $jenisTrayek;
        }
        if ($provinsi) {
            $fileName .= '_' . str_replace(' ', '_', $provinsi);
        }
        if ($kabupaten) {
            $fileName .= '_' . str_replace(' ', '_', $kabupaten);
        }
        if ($terminalTujuan) {
            $fileName .= '_' . str_replace(' ', '_', $terminalTujuan);
        }

        $fileName .= '.xlsx';

        return Excel::download(new DataProduksiExport($bulan, $tahun, $jenisTrayek, $provinsi, $kabupaten, $terminalTujuan), $fileName);
    }

    public function preview(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $jenisTrayek = $request->jenis_trayek;
        $provinsi = $request->provinsi;
        $kabupaten = $request->kabupaten;
        $terminalTujuan = $request->terminal_tujuan;

        // Query data dengan filter
        $query = DataProduksi::with('dataMaster')
            ->where(function ($query) use ($bulan, $tahun) {
                $query->where(function ($q) use ($bulan, $tahun) {
                    $q->whereYear('bus_berangkat', $tahun)
                        ->whereMonth('bus_berangkat', $bulan);
                })->orWhere(function ($q) use ($bulan, $tahun) {
                    $q->whereYear('bus_datang', $tahun)
                        ->whereMonth('bus_datang', $bulan);
                });
            });

        // Terapkan filter jenis trayek jika ada
        if ($jenisTrayek) {
            $query->whereHas('dataMaster', function ($q) use ($jenisTrayek) {
                $q->where('jenis_trayek', $jenisTrayek);
            });
        }

        // Terapkan filter jika ada
        if ($provinsi) {
            $query->whereHas('dataMaster', function ($q) use ($provinsi) {
                $q->where('provinsi', $provinsi);
            });
        }

        if ($kabupaten) {
            $query->whereHas('dataMaster', function ($q) use ($kabupaten) {
                $q->where('kabupaten', $kabupaten);
            });
        }

        if ($terminalTujuan) {
            $query->whereHas('dataMaster', function ($q) use ($terminalTujuan) {
                $q->where('terminal_tujuan', $terminalTujuan);
            });
        }

        $data = $query->orderBy('created_at', 'desc')->take(50)->get();
        $total = $query->count();

        // Format data untuk preview
        $previewData = [];
        foreach ($data as $item) {
            $tanggal = '-';
            if ($item->bus_berangkat) {
                $tanggal = \Carbon\Carbon::parse($item->bus_berangkat)->format('d-m-Y');
            } elseif ($item->bus_datang) {
                $tanggal = \Carbon\Carbon::parse($item->bus_datang)->format('d-m-Y');
            }

            $previewData[] = [
                'no_kendaraan' => $item->no_kendaraan,
                'nama_po' => $item->dataMaster->nama_po ?? '-',
                'provinsi' => $item->dataMaster->provinsi ?? '-',
                'kabupaten' => $item->dataMaster->kabupaten ?? '-',
                'terminal_tujuan' => $item->dataMaster->terminal_tujuan ?? '-',
                'tanggal' => $tanggal,
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $previewData,
            'total' => $total
        ]);
    }

    public function exportPdf(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2020',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $jenisTrayek = $request->jenis_trayek;
        $provinsi = $request->provinsi;
        $kabupaten = $request->kabupaten;
        $terminalTujuan = $request->terminal_tujuan;

        $bulanNama = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        // Ambil data dengan logika yang sama dan filter
        $query = DataProduksi::with('dataMaster')
            ->where(function ($query) use ($bulan, $tahun) {
                $query->where(function ($q) use ($bulan, $tahun) {
                    $q->whereYear('bus_berangkat', $tahun)
                        ->whereMonth('bus_berangkat', $bulan);
                })->orWhere(function ($q) use ($bulan, $tahun) {
                    $q->whereYear('bus_datang', $tahun)
                        ->whereMonth('bus_datang', $bulan);
                });
            });

        // Terapkan filter jenis trayek jika ada
        if ($jenisTrayek) {
            $query->whereHas('dataMaster', function ($q) use ($jenisTrayek) {
                $q->where('jenis_trayek', $jenisTrayek);
            });
        }

        // Terapkan filter jika ada
        if ($provinsi) {
            $query->whereHas('dataMaster', function ($q) use ($provinsi) {
                $q->where('provinsi', $provinsi);
            });
        }

        if ($kabupaten) {
            $query->whereHas('dataMaster', function ($q) use ($kabupaten) {
                $q->where('kabupaten', $kabupaten);
            });
        }

        if ($terminalTujuan) {
            $query->whereHas('dataMaster', function ($q) use ($terminalTujuan) {
                $q->where('terminal_tujuan', $terminalTujuan);
            });
        }

        $allData = $query->orderBy('created_at', 'desc')->get();

        // Group dan pairing data (sama seperti di index)
        $groupedByKendaraan = $allData->groupBy('no_kendaraan');
        $dataProduksi = [];

        foreach ($groupedByKendaraan as $noKendaraan => $dataGroup) {
            $keberangkatan = $dataGroup->filter(function ($item) {
                return $item->waktu_berangkat && !$item->waktu_datang;
            })->sortBy(function ($item) {
                return strtotime($item->bus_berangkat . ' ' . $item->waktu_berangkat);
            })->values();

            $kedatangan = $dataGroup->filter(function ($item) {
                return $item->waktu_datang && !$item->waktu_berangkat;
            })->sortBy(function ($item) {
                return strtotime($item->bus_datang . ' ' . $item->waktu_datang);
            })->values();

            $lengkap = $dataGroup->filter(function ($item) {
                return $item->waktu_berangkat && $item->waktu_datang;
            });

            foreach ($lengkap as $item) {
                $dataProduksi[] = $item;
            }

            $usedKedatanganIds = [];

            foreach ($keberangkatan as $berangkat) {
                $bestMatch = null;
                $shortestTimeDiff = null;

                foreach ($kedatangan as $datang) {
                    if (in_array($datang->id, $usedKedatanganIds)) {
                        continue;
                    }

                    $berangkatTime = strtotime($berangkat->bus_berangkat . ' ' . $berangkat->waktu_berangkat);
                    $datangTime = strtotime($datang->bus_datang . ' ' . $datang->waktu_datang);
                    $timeDiff = abs($datangTime - $berangkatTime);

                    if ($timeDiff <= 172800 && ($shortestTimeDiff === null || $timeDiff < $shortestTimeDiff)) {
                        $shortestTimeDiff = $timeDiff;
                        $bestMatch = $datang;
                    }
                }

                if ($bestMatch) {
                    $combined = (object)[
                        'id' => $berangkat->id,
                        'data_master_id' => $berangkat->data_master_id,
                        'no_kendaraan' => $berangkat->no_kendaraan,
                        'dataMaster' => $berangkat->dataMaster,
                        'jml_pnp_berangkat' => $berangkat->jml_pnp_berangkat,
                        'waktu_berangkat' => $berangkat->waktu_berangkat,
                        'bus_berangkat' => $berangkat->bus_berangkat,
                        'jml_pnp_datang' => $bestMatch->jml_pnp_datang,
                        'waktu_datang' => $bestMatch->waktu_datang,
                        'bus_datang' => $bestMatch->bus_datang,
                        'created_at' => $berangkat->created_at,
                    ];
                    $dataProduksi[] = $combined;
                    $usedKedatanganIds[] = $bestMatch->id;
                } else {
                    $dataProduksi[] = $berangkat;
                }
            }

            foreach ($kedatangan as $datang) {
                if (!in_array($datang->id, $usedKedatanganIds)) {
                    $dataProduksi[] = $datang;
                }
            }
        }

        $data = [
            'dataProduksi' => $dataProduksi,
            'bulan' => $bulanNama[$bulan],
            'tahun' => $tahun,
            'tanggal_cetak' => date('d-m-Y H:i'),
            'filter_provinsi' => $provinsi,
            'filter_kabupaten' => $kabupaten,
            'filter_terminal' => $terminalTujuan
        ];

        $pdf = Pdf::loadView('sistem_informasi.data_produksi.pdf', $data)
            ->setPaper('a4', 'landscape');

        $fileName = 'Data_Produksi_' . $bulanNama[$bulan] . '_' . $tahun;

        // Tambahkan filter ke nama file jika ada
        if ($provinsi) {
            $fileName .= '_' . str_replace(' ', '_', $provinsi);
        }
        if ($kabupaten) {
            $fileName .= '_' . str_replace(' ', '_', $kabupaten);
        }
        if ($terminalTujuan) {
            $fileName .= '_' . str_replace(' ', '_', $terminalTujuan);
        }

        $fileName .= '.pdf';

        return $pdf->download($fileName);
    }

    public function rekapBulanan(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));

        $rekapData = [];
        $totals = [
            'akap' => [
                'bis_datang' => 0,
                'penumpang_datang' => 0,
                'bis_berangkat' => 0,
                'penumpang_berangkat' => 0
            ],
            'akdp' => [
                'bis_datang' => 0,
                'penumpang_datang' => 0,
                'bis_berangkat' => 0,
                'penumpang_berangkat' => 0
            ]
        ];

        // Loop untuk setiap bulan
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

            // Data AKAP
            $akapData = DataProduksi::with('dataMaster')
                ->whereHas('dataMaster', function ($q) {
                    $q->where('jenis_trayek', 'AKAP');
                })
                ->where(function ($query) use ($tahun, $bulan) {
                    $query->whereYear('bus_berangkat', $tahun)
                        ->whereMonth('bus_berangkat', $bulan)
                        ->orWhere(function ($q) use ($tahun, $bulan) {
                            $q->whereYear('bus_datang', $tahun)
                                ->whereMonth('bus_datang', $bulan);
                        });
                })
                ->get();

            // Data AKDP
            $akdpData = DataProduksi::with('dataMaster')
                ->whereHas('dataMaster', function ($q) {
                    $q->where('jenis_trayek', 'AKDP');
                })
                ->where(function ($query) use ($tahun, $bulan) {
                    $query->whereYear('bus_berangkat', $tahun)
                        ->whereMonth('bus_berangkat', $bulan)
                        ->orWhere(function ($q) use ($tahun, $bulan) {
                            $q->whereYear('bus_datang', $tahun)
                                ->whereMonth('bus_datang', $bulan);
                        });
                })
                ->get();

            $akap = [
                'bis_datang' => 0,
                'penumpang_datang' => 0,
                'bis_berangkat' => 0,
                'penumpang_berangkat' => 0
            ];

            foreach ($akapData as $item) {
                // Hitung keberangkatan
                if (
                    $item->bus_berangkat && date('Y', strtotime($item->bus_berangkat)) == $tahun &&
                    date('m', strtotime($item->bus_berangkat)) == $bulan
                ) {
                    $akap['bis_berangkat']++;
                    $akap['penumpang_berangkat'] += $item->jml_pnp_berangkat ?? 0;
                }

                // Hitung kedatangan (data yang punya waktu_datang)
                if (
                    $item->waktu_datang && !$item->waktu_berangkat &&
                    $item->bus_datang && date('Y', strtotime($item->bus_datang)) == $tahun &&
                    date('m', strtotime($item->bus_datang)) == $bulan
                ) {
                    $akap['bis_datang']++;
                    $akap['penumpang_datang'] += $item->jml_pnp_datang ?? 0;
                }
            }

            $akdp = [
                'bis_datang' => 0,
                'penumpang_datang' => 0,
                'bis_berangkat' => 0,
                'penumpang_berangkat' => 0
            ];

            foreach ($akdpData as $item) {
                // Hitung keberangkatan
                if (
                    $item->bus_berangkat && date('Y', strtotime($item->bus_berangkat)) == $tahun &&
                    date('m', strtotime($item->bus_berangkat)) == $bulan
                ) {
                    $akdp['bis_berangkat']++;
                    $akdp['penumpang_berangkat'] += $item->jml_pnp_berangkat ?? 0;
                }

                // Hitung kedatangan (data yang punya waktu_datang)
                if (
                    $item->waktu_datang && !$item->waktu_berangkat &&
                    $item->bus_datang && date('Y', strtotime($item->bus_datang)) == $tahun &&
                    date('m', strtotime($item->bus_datang)) == $bulan
                ) {
                    $akdp['bis_datang']++;
                    $akdp['penumpang_datang'] += $item->jml_pnp_datang ?? 0;
                }
            }

            // Tambahkan ke totals
            foreach ($akap as $key => $value) {
                $totals['akap'][$key] += $value;
            }
            foreach ($akdp as $key => $value) {
                $totals['akdp'][$key] += $value;
            }

            $rekapData[] = [
                'bulan' => $bulan,
                'akap' => $akap,
                'akdp' => $akdp
            ];
        }

        // Jika request AJAX, return JSON
        if ($request->ajax() || $request->input('ajax')) {
            return response()->json([
                'success' => true,
                'data' => $rekapData,
                'totals' => $totals
            ]);
        }

        return view('sistem_informasi.data_produksi.rekap_bulanan', compact('tahun', 'rekapData', 'totals'));
    }

    public function grafik(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));
        $bulan = $request->input('bulan', date('m'));

        // Method ini belum diimplementasikan dengan struktur tabel yang benar

        return view('sistem_informasi.data_produksi.grafik', compact('tahun', 'bulan'));
    }
    public function laporanHarian(Request $request)
    {
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));

        // Get number of days in the selected month
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        $laporanData = [];
        $totals = [
            'akap' => [
                'bis_datang' => 0,
                'penumpang_datang' => 0,
                'penumpang_turun' => 0,
                'bis_berangkat' => 0,
                'penumpang_naik' => 0,
                'penumpang_berangkat' => 0
            ],
            'akdp' => [
                'bis_datang' => 0,
                'penumpang_datang' => 0,
                'penumpang_turun' => 0,
                'bis_berangkat' => 0,
                'penumpang_naik' => 0,
                'penumpang_berangkat' => 0
            ]
        ];

        // Loop through each day of the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = sprintf('%04d-%02d-%02d', $tahun, $bulan, $day);
            $yesterday = date('Y-m-d', strtotime($date . ' -1 day'));
            $tanggalFormatted = sprintf('%d-%d-%04d', $day, $bulan, $tahun);

            // Get AKAP data (jenis_trayek = 'AKAP')
            $akapData = DataProduksi::with('dataMaster')
                ->whereHas('dataMaster', function ($q) {
                    $q->where('jenis_trayek', 'AKAP');
                })
                ->where(function ($query) use ($date, $yesterday) {
                    $query->where(function ($q) use ($date) {
                        // Data keberangkatan
                        $q->whereNotNull('waktu_berangkat')
                            ->whereDate('bus_berangkat', $date);
                    })->orWhere(function ($q) use ($date, $yesterday) {
                        // Data kedatangan: hari ini + kemarin malam (setelah jam 18:00)
                        $q->whereNotNull('waktu_datang')
                            ->whereNull('waktu_berangkat')
                            ->where(function ($subQ) use ($date, $yesterday) {
                                $subQ->whereDate('bus_datang', $date)
                                    ->orWhere(function ($nightQ) use ($yesterday) {
                                        $nightQ->whereDate('bus_datang', $yesterday)
                                            ->whereTime('waktu_datang', '>=', '18:00:00');
                                    });
                            });
                    });
                })
                ->get();

            // Get AKDP data (jenis_trayek = 'AKDP')
            $akdpData = DataProduksi::with('dataMaster')
                ->whereHas('dataMaster', function ($q) {
                    $q->where('jenis_trayek', 'AKDP');
                })
                ->where(function ($query) use ($date, $yesterday) {
                    $query->where(function ($q) use ($date) {
                        // Data keberangkatan
                        $q->whereNotNull('waktu_berangkat')
                            ->whereDate('bus_berangkat', $date);
                    })->orWhere(function ($q) use ($date, $yesterday) {
                        // Data kedatangan: hari ini + kemarin malam (setelah jam 18:00)
                        $q->whereNotNull('waktu_datang')
                            ->whereNull('waktu_berangkat')
                            ->where(function ($subQ) use ($date, $yesterday) {
                                $subQ->whereDate('bus_datang', $date)
                                    ->orWhere(function ($nightQ) use ($yesterday) {
                                        $nightQ->whereDate('bus_datang', $yesterday)
                                            ->whereTime('waktu_datang', '>=', '18:00:00');
                                    });
                            });
                    });
                })
                ->get();

            // Calculate AKAP statistics
            $akap = [
                'bis_datang' => 0,
                'penumpang_datang' => 0,
                'penumpang_turun' => 0,
                'bis_berangkat' => 0,
                'penumpang_naik' => 0,
                'penumpang_berangkat' => 0
            ];

            foreach ($akapData as $item) {
                // Hitung keberangkatan
                if ($item->bus_berangkat && date('Y-m-d', strtotime($item->bus_berangkat)) === $date) {
                    $akap['bis_berangkat']++;
                    $akap['penumpang_naik'] += $item->jml_pnp_berangkat ?? 0;
                    $akap['penumpang_berangkat'] += $item->jml_pnp_berangkat ?? 0;

                    // Hitung kedatangan yang di-pair dengan keberangkatan ini
                    $kedatangan = DataProduksi::where('no_kendaraan', $item->no_kendaraan)
                        ->whereNotNull('waktu_datang')
                        ->whereNull('waktu_berangkat')
                        ->where('bus_datang', '<=', $item->bus_berangkat)
                        ->orderBy('bus_datang', 'desc')
                        ->first();

                    if ($kedatangan) {
                        $akap['bis_datang']++;
                        $akap['penumpang_datang'] += $kedatangan->jml_pnp_datang ?? 0;
                        $akap['penumpang_turun'] += $kedatangan->jml_pnp_datang ?? 0;
                    }
                }
            }

            // Calculate AKDP statistics
            $akdp = [
                'bis_datang' => 0,
                'penumpang_datang' => 0,
                'penumpang_turun' => 0,
                'bis_berangkat' => 0,
                'penumpang_naik' => 0,
                'penumpang_berangkat' => 0
            ];

            foreach ($akdpData as $item) {
                // Hitung keberangkatan
                if ($item->bus_berangkat && date('Y-m-d', strtotime($item->bus_berangkat)) === $date) {
                    $akdp['bis_berangkat']++;
                    $akdp['penumpang_naik'] += $item->jml_pnp_berangkat ?? 0;
                    $akdp['penumpang_berangkat'] += $item->jml_pnp_berangkat ?? 0;

                    // Hitung kedatangan yang di-pair dengan keberangkatan ini
                    $kedatangan = DataProduksi::where('no_kendaraan', $item->no_kendaraan)
                        ->whereNotNull('waktu_datang')
                        ->whereNull('waktu_berangkat')
                        ->where('bus_datang', '<=', $item->bus_berangkat)
                        ->orderBy('bus_datang', 'desc')
                        ->first();

                    if ($kedatangan) {
                        $akdp['bis_datang']++;
                        $akdp['penumpang_datang'] += $kedatangan->jml_pnp_datang ?? 0;
                        $akdp['penumpang_turun'] += $kedatangan->jml_pnp_datang ?? 0;
                    }
                }
            }

            // Add to totals
            foreach ($akap as $key => $value) {
                $totals['akap'][$key] += $value;
            }
            foreach ($akdp as $key => $value) {
                $totals['akdp'][$key] += $value;
            }

            // Add to laporan data
            $laporanData[] = [
                'tanggal' => $tanggalFormatted,
                'akap' => $akap,
                'akdp' => $akdp
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $laporanData,
            'totals' => $totals
        ]);
    }

    public function exportLaporanPdf(Request $request)
    {
        try {
            $bulan = $request->input('bulan', date('m'));
            $tahun = $request->input('tahun', date('Y'));

            // Validate bulan and tahun
            if (!$bulan || !$tahun) {
                return back()->with('error', 'Bulan dan tahun harus dipilih');
            }

            $bulanNama = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];

            // Get the data same way as laporanHarian method
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

            $laporanData = [];
            $totals = [
                'akap' => [
                    'bis_datang' => 0,
                    'penumpang_datang' => 0,
                    'penumpang_turun' => 0,
                    'bis_berangkat' => 0,
                    'penumpang_naik' => 0,
                    'penumpang_berangkat' => 0
                ],
                'akdp' => [
                    'bis_datang' => 0,
                    'penumpang_datang' => 0,
                    'penumpang_turun' => 0,
                    'bis_berangkat' => 0,
                    'penumpang_naik' => 0,
                    'penumpang_berangkat' => 0
                ]
            ];

            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = sprintf('%04d-%02d-%02d', $tahun, $bulan, $day);
                $yesterday = date('Y-m-d', strtotime($date . ' -1 day'));
                $tanggalFormatted = sprintf('%d-%d-%04d', $day, $bulan, $tahun);

                $akapData = DataProduksi::with('dataMaster')
                    ->whereHas('dataMaster', function ($q) {
                        $q->where('jenis_trayek', 'AKAP');
                    })
                    ->where(function ($query) use ($date, $yesterday) {
                        $query->where(function ($q) use ($date) {
                            // Data keberangkatan
                            $q->whereNotNull('waktu_berangkat')
                                ->whereDate('bus_berangkat', $date);
                        })->orWhere(function ($q) use ($date, $yesterday) {
                            // Data kedatangan (hari ini + kemarin malam setelah 18:00)
                            $q->whereNotNull('waktu_datang')
                                ->whereNull('waktu_berangkat')
                                ->where(function ($subQ) use ($date, $yesterday) {
                                    $subQ->whereDate('bus_datang', $date)
                                        ->orWhere(function ($nightQ) use ($yesterday) {
                                            $nightQ->whereDate('bus_datang', $yesterday)
                                                ->whereTime('waktu_datang', '>=', '18:00:00');
                                        });
                                });
                        });
                    })
                    ->get();

                $akdpData = DataProduksi::with('dataMaster')
                    ->whereHas('dataMaster', function ($q) {
                        $q->where('jenis_trayek', 'AKDP');
                    })
                    ->where(function ($query) use ($date, $yesterday) {
                        $query->where(function ($q) use ($date) {
                            // Data keberangkatan
                            $q->whereNotNull('waktu_berangkat')
                                ->whereDate('bus_berangkat', $date);
                        })->orWhere(function ($q) use ($date, $yesterday) {
                            // Data kedatangan (hari ini + kemarin malam setelah 18:00)
                            $q->whereNotNull('waktu_datang')
                                ->whereNull('waktu_berangkat')
                                ->where(function ($subQ) use ($date, $yesterday) {
                                    $subQ->whereDate('bus_datang', $date)
                                        ->orWhere(function ($nightQ) use ($yesterday) {
                                            $nightQ->whereDate('bus_datang', $yesterday)
                                                ->whereTime('waktu_datang', '>=', '18:00:00');
                                        });
                                });
                        });
                    })
                    ->get();

                $akap = [
                    'bis_datang' => 0,
                    'penumpang_datang' => 0,
                    'penumpang_turun' => 0,
                    'bis_berangkat' => 0,
                    'penumpang_naik' => 0,
                    'penumpang_berangkat' => 0
                ];

                foreach ($akapData as $item) {
                    // Hitung keberangkatan
                    if ($item->bus_berangkat && date('Y-m-d', strtotime($item->bus_berangkat)) === $date) {
                        $akap['bis_berangkat']++;
                        $akap['penumpang_naik'] += $item->jml_pnp_berangkat ?? 0;
                        $akap['penumpang_berangkat'] += $item->jml_pnp_berangkat ?? 0;

                        // Hitung kedatangan yang di-pair dengan keberangkatan ini
                        $kedatangan = DataProduksi::where('no_kendaraan', $item->no_kendaraan)
                            ->whereNotNull('waktu_datang')
                            ->whereNull('waktu_berangkat')
                            ->where('bus_datang', '<=', $item->bus_berangkat)
                            ->orderBy('bus_datang', 'desc')
                            ->first();

                        if ($kedatangan) {
                            $akap['bis_datang']++;
                            $akap['penumpang_datang'] += $kedatangan->jml_pnp_datang ?? 0;
                            $akap['penumpang_turun'] += $kedatangan->jml_pnp_datang ?? 0;
                        }
                    }
                }

                $akdp = [
                    'bis_datang' => 0,
                    'penumpang_datang' => 0,
                    'penumpang_turun' => 0,
                    'bis_berangkat' => 0,
                    'penumpang_naik' => 0,
                    'penumpang_berangkat' => 0
                ];

                foreach ($akdpData as $item) {
                    // Hitung keberangkatan
                    if ($item->bus_berangkat && date('Y-m-d', strtotime($item->bus_berangkat)) === $date) {
                        $akdp['bis_berangkat']++;
                        $akdp['penumpang_naik'] += $item->jml_pnp_berangkat ?? 0;
                        $akdp['penumpang_berangkat'] += $item->jml_pnp_berangkat ?? 0;

                        // Hitung kedatangan yang di-pair dengan keberangkatan ini
                        $kedatangan = DataProduksi::where('no_kendaraan', $item->no_kendaraan)
                            ->whereNotNull('waktu_datang')
                            ->whereNull('waktu_berangkat')
                            ->where('bus_datang', '<=', $item->bus_berangkat)
                            ->orderBy('bus_datang', 'desc')
                            ->first();

                        if ($kedatangan) {
                            $akdp['bis_datang']++;
                            $akdp['penumpang_datang'] += $kedatangan->jml_pnp_datang ?? 0;
                            $akdp['penumpang_turun'] += $kedatangan->jml_pnp_datang ?? 0;
                        }
                    }
                }

                foreach ($akap as $key => $value) {
                    $totals['akap'][$key] += $value;
                }
                foreach ($akdp as $key => $value) {
                    $totals['akdp'][$key] += $value;
                }

                $laporanData[] = [
                    'tanggal' => $tanggalFormatted,
                    'akap' => $akap,
                    'akdp' => $akdp
                ];
            }

            $data = [
                'laporanData' => $laporanData,
                'totals' => $totals,
                'bulan' => $bulanNama[(int)$bulan],
                'tahun' => $tahun,
                'tanggal_cetak' => date('d-m-Y H:i')
            ];

            $pdf = Pdf::loadView('sistem_informasi.data_produksi.laporan_pdf', $data)
                ->setPaper('a4', 'landscape');

            $fileName = 'Laporan_Produksi_Harian_' . $bulanNama[(int)$bulan] . '_' . $tahun . '.pdf';

            return $pdf->download($fileName);
        } catch (\Exception $e) {
            \Log::error('Error export PDF: ' . $e->getMessage());
            return back()->with('error', 'Gagal mengekspor PDF: ' . $e->getMessage());
        }
    }

    public function exportRekapPdf(Request $request)
    {
        try {
            $tahun = $request->input('tahun', date('Y'));

            if (!$tahun) {
                return back()->with('error', 'Tahun harus dipilih');
            }

            $rekapData = [];
            $totals = [
                'akap' => [
                    'bis_datang' => 0,
                    'penumpang_datang' => 0,
                    'bis_berangkat' => 0,
                    'penumpang_berangkat' => 0
                ],
                'akdp' => [
                    'bis_datang' => 0,
                    'penumpang_datang' => 0,
                    'bis_berangkat' => 0,
                    'penumpang_berangkat' => 0
                ]
            ];

            for ($bulan = 1; $bulan <= 12; $bulan++) {
                $akapData = DataProduksi::with('dataMaster')
                    ->whereHas('dataMaster', function ($q) {
                        $q->where('jenis_trayek', 'AKAP');
                    })
                    ->where(function ($query) use ($tahun, $bulan) {
                        $query->whereYear('bus_berangkat', $tahun)
                            ->whereMonth('bus_berangkat', $bulan)
                            ->orWhere(function ($q) use ($tahun, $bulan) {
                                $q->whereYear('bus_datang', $tahun)
                                    ->whereMonth('bus_datang', $bulan);
                            });
                    })
                    ->get();

                $akdpData = DataProduksi::with('dataMaster')
                    ->whereHas('dataMaster', function ($q) {
                        $q->where('jenis_trayek', 'AKDP');
                    })
                    ->where(function ($query) use ($tahun, $bulan) {
                        $query->whereYear('bus_berangkat', $tahun)
                            ->whereMonth('bus_berangkat', $bulan)
                            ->orWhere(function ($q) use ($tahun, $bulan) {
                                $q->whereYear('bus_datang', $tahun)
                                    ->whereMonth('bus_datang', $bulan);
                            });
                    })
                    ->get();

                $akap = [
                    'bis_datang' => 0,
                    'penumpang_datang' => 0,
                    'bis_berangkat' => 0,
                    'penumpang_berangkat' => 0
                ];

                foreach ($akapData as $item) {
                    if (
                        $item->bus_berangkat && date('Y', strtotime($item->bus_berangkat)) == $tahun &&
                        date('m', strtotime($item->bus_berangkat)) == $bulan
                    ) {
                        $akap['bis_berangkat']++;
                        $akap['penumpang_berangkat'] += $item->jml_pnp_berangkat ?? 0;

                        // Bis yang berangkat = bis yang datang
                        $akap['bis_datang']++;

                        // Cari data kedatangan untuk bus ini
                        $kedatangan = DataProduksi::where('no_kendaraan', $item->no_kendaraan)
                            ->whereNotNull('waktu_datang')
                            ->whereNull('waktu_berangkat')
                            ->where('bus_datang', '<=', $item->bus_berangkat)
                            ->orderBy('bus_datang', 'desc')
                            ->first();

                        if ($kedatangan) {
                            $akap['penumpang_datang'] += $kedatangan->jml_pnp_datang ?? 0;
                        }
                    }
                }

                $akdp = [
                    'bis_datang' => 0,
                    'penumpang_datang' => 0,
                    'bis_berangkat' => 0,
                    'penumpang_berangkat' => 0
                ];

                foreach ($akdpData as $item) {
                    if (
                        $item->bus_berangkat && date('Y', strtotime($item->bus_berangkat)) == $tahun &&
                        date('m', strtotime($item->bus_berangkat)) == $bulan
                    ) {
                        $akdp['bis_berangkat']++;
                        $akdp['penumpang_berangkat'] += $item->jml_pnp_berangkat ?? 0;

                        // Bis yang berangkat = bis yang datang
                        $akdp['bis_datang']++;

                        // Cari data kedatangan untuk bus ini
                        $kedatangan = DataProduksi::where('no_kendaraan', $item->no_kendaraan)
                            ->whereNotNull('waktu_datang')
                            ->whereNull('waktu_berangkat')
                            ->where('bus_datang', '<=', $item->bus_berangkat)
                            ->orderBy('bus_datang', 'desc')
                            ->first();

                        if ($kedatangan) {
                            $akdp['penumpang_datang'] += $kedatangan->jml_pnp_datang ?? 0;
                        }
                    }
                }

                foreach ($akap as $key => $value) {
                    $totals['akap'][$key] += $value;
                }
                foreach ($akdp as $key => $value) {
                    $totals['akdp'][$key] += $value;
                }

                $rekapData[] = [
                    'bulan' => $bulan,
                    'akap' => $akap,
                    'akdp' => $akdp
                ];
            }

            $data = [
                'rekapData' => $rekapData,
                'totals' => $totals,
                'tahun' => $tahun,
                'tanggal_cetak' => date('d-m-Y H:i')
            ];

            $pdf = Pdf::loadView('sistem_informasi.data_produksi.rekap_pdf', $data)
                ->setPaper('a4', 'landscape');

            $fileName = 'Rekap_Bulanan_Produksi_' . $tahun . '.pdf';

            return $pdf->download($fileName);
        } catch (\Exception $e) {
            \Log::error('Error export PDF Rekap: ' . $e->getMessage());
            return back()->with('error', 'Gagal mengekspor PDF: ' . $e->getMessage());
        }
    }

    public function grafikData(Request $request)
    {
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));
        $jenisGrafik = $request->input('jenis', 'harian');

        if ($jenisGrafik === 'bulanan') {
            // Data bulanan untuk satu tahun
            $labels = [];
            $akapBisDatang = [];
            $akapPenumpangDatang = [];
            $akdpBisDatang = [];
            $akdpPenumpangDatang = [];

            $bulanNama = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];

            for ($m = 1; $m <= 12; $m++) {
                $labels[] = $bulanNama[$m - 1];

                // AKAP
                $akapData = DataProduksi::with('dataMaster')
                    ->whereHas('dataMaster', function ($q) {
                        $q->where('jenis_trayek', 'AKAP');
                    })
                    ->whereNotNull('waktu_berangkat')
                    ->where(function ($query) use ($tahun, $m) {
                        $query->whereYear('bus_berangkat', $tahun)
                            ->whereMonth('bus_berangkat', $m);
                    })
                    ->get();

                $akapBisDatang[] = $akapData->count();

                // Hitung penumpang datang dari pairing
                $totalPenumpang = 0;
                foreach ($akapData as $item) {
                    $kedatangan = DataProduksi::where('no_kendaraan', $item->no_kendaraan)
                        ->whereNotNull('waktu_datang')
                        ->whereNull('waktu_berangkat')
                        ->where('bus_datang', '<=', $item->bus_berangkat)
                        ->orderBy('bus_datang', 'desc')
                        ->first();
                    if ($kedatangan) {
                        $totalPenumpang += $kedatangan->jml_pnp_datang ?? 0;
                    }
                }
                $akapPenumpangDatang[] = $totalPenumpang;

                // AKDP
                $akdpData = DataProduksi::with('dataMaster')
                    ->whereHas('dataMaster', function ($q) {
                        $q->where('jenis_trayek', 'AKDP');
                    })
                    ->whereNotNull('waktu_berangkat')
                    ->where(function ($query) use ($tahun, $m) {
                        $query->whereYear('bus_berangkat', $tahun)
                            ->whereMonth('bus_berangkat', $m);
                    })
                    ->get();

                $akdpBisDatang[] = $akdpData->count();

                // Hitung penumpang datang dari pairing
                $totalPenumpang = 0;
                foreach ($akdpData as $item) {
                    $kedatangan = DataProduksi::where('no_kendaraan', $item->no_kendaraan)
                        ->whereNotNull('waktu_datang')
                        ->whereNull('waktu_berangkat')
                        ->where('bus_datang', '<=', $item->bus_berangkat)
                        ->orderBy('bus_datang', 'desc')
                        ->first();
                    if ($kedatangan) {
                        $totalPenumpang += $kedatangan->jml_pnp_datang ?? 0;
                    }
                }
                $akdpPenumpangDatang[] = $totalPenumpang;
            }

            return response()->json([
                'success' => true,
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => 'AKAP - Bis Datang',
                        'data' => $akapBisDatang,
                        'borderColor' => 'rgb(54, 162, 235)',
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    ],
                    [
                        'label' => 'AKAP - Penumpang',
                        'data' => $akapPenumpangDatang,
                        'borderColor' => 'rgb(75, 192, 192)',
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    ],
                    [
                        'label' => 'AKDP - Bis Datang',
                        'data' => $akdpBisDatang,
                        'borderColor' => 'rgb(255, 99, 132)',
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    ],
                    [
                        'label' => 'AKDP - Penumpang',
                        'data' => $akdpPenumpangDatang,
                        'borderColor' => 'rgb(255, 159, 64)',
                        'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
                    ]
                ]
            ]);
        } else {
            // Data harian untuk satu bulan
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
            $labels = [];
            $akapBisDatang = [];
            $akapPenumpangDatang = [];
            $akdpBisDatang = [];
            $akdpPenumpangDatang = [];

            for ($day = 1; $day <= $daysInMonth; $day++) {
                $labels[] = $day;
                $date = sprintf('%04d-%02d-%02d', $tahun, $bulan, $day);

                // AKAP
                $akapData = DataProduksi::with('dataMaster')
                    ->whereHas('dataMaster', function ($q) {
                        $q->where('jenis_trayek', 'AKAP');
                    })
                    ->whereNotNull('waktu_berangkat')
                    ->whereDate('bus_berangkat', $date)
                    ->get();

                $akapBisDatang[] = $akapData->count();

                // Hitung penumpang datang dari pairing
                $totalPenumpang = 0;
                foreach ($akapData as $item) {
                    $kedatangan = DataProduksi::where('no_kendaraan', $item->no_kendaraan)
                        ->whereNotNull('waktu_datang')
                        ->whereNull('waktu_berangkat')
                        ->where('bus_datang', '<=', $item->bus_berangkat)
                        ->orderBy('bus_datang', 'desc')
                        ->first();
                    if ($kedatangan) {
                        $totalPenumpang += $kedatangan->jml_pnp_datang ?? 0;
                    }
                }
                $akapPenumpangDatang[] = $totalPenumpang;

                // AKDP
                $akdpData = DataProduksi::with('dataMaster')
                    ->whereHas('dataMaster', function ($q) {
                        $q->where('jenis_trayek', 'AKDP');
                    })
                    ->whereNotNull('waktu_berangkat')
                    ->whereDate('bus_berangkat', $date)
                    ->get();

                $akdpBisDatang[] = $akdpData->count();

                // Hitung penumpang datang dari pairing
                $totalPenumpang = 0;
                foreach ($akdpData as $item) {
                    $kedatangan = DataProduksi::where('no_kendaraan', $item->no_kendaraan)
                        ->whereNotNull('waktu_datang')
                        ->whereNull('waktu_berangkat')
                        ->where('bus_datang', '<=', $item->bus_berangkat)
                        ->orderBy('bus_datang', 'desc')
                        ->first();
                    if ($kedatangan) {
                        $totalPenumpang += $kedatangan->jml_pnp_datang ?? 0;
                    }
                }
                $akdpPenumpangDatang[] = $totalPenumpang;
            }

            return response()->json([
                'success' => true,
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => 'AKAP - Bis Datang',
                        'data' => $akapBisDatang,
                        'borderColor' => 'rgb(54, 162, 235)',
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    ],
                    [
                        'label' => 'AKAP - Penumpang',
                        'data' => $akapPenumpangDatang,
                        'borderColor' => 'rgb(75, 192, 192)',
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    ],
                    [
                        'label' => 'AKDP - Bis Datang',
                        'data' => $akdpBisDatang,
                        'borderColor' => 'rgb(255, 99, 132)',
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    ],
                    [
                        'label' => 'AKDP - Penumpang',
                        'data' => $akdpPenumpangDatang,
                        'borderColor' => 'rgb(255, 159, 64)',
                        'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
                    ]
                ]
            ]);
        }
    }
}
