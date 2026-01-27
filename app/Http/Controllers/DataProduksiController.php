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

        // Total bus berangkat hari ini (berdasarkan tanggal berangkat)
        $totalBusBerangkatHariIni = DataProduksi::whereNotNull('waktu_berangkat')
            ->whereDate('bus_berangkat', $today)
            ->count();

        // Total bus datang hari ini (berdasarkan tanggal datang, termasuk yang berangkat kemarin)
        $totalBusDatangHariIni = DataProduksi::whereNotNull('waktu_datang')
            ->whereDate('bus_datang', $today)
            ->count();

        // Total penumpang berangkat hari ini
        $totalPenumpangBerangkatHariIni = DataProduksi::whereNotNull('waktu_berangkat')
            ->whereDate('bus_berangkat', $today)
            ->sum('jml_pnp_berangkat');

        // Total penumpang datang hari ini
        $totalPenumpangDatangHariIni = DataProduksi::whereNotNull('waktu_datang')
            ->whereDate('bus_datang', $today)
            ->sum('jml_pnp_datang');

        // Implementasi pagination manual untuk array
        $page = $request->get('page', 1);
        $perPage = 15;
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

        $fileName = 'Data_Produksi_' . $bulanNama[$bulan] . '_' . $tahun . '.xlsx';

        return Excel::download(new DataProduksiExport($bulan, $tahun), $fileName);
    }

    public function exportPdf(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2020',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;

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

        // Ambil data dengan logika yang sama
        $allData = DataProduksi::with('dataMaster')
            ->where(function ($query) use ($bulan, $tahun) {
                $query->where(function ($q) use ($bulan, $tahun) {
                    $q->whereYear('bus_berangkat', $tahun)
                        ->whereMonth('bus_berangkat', $bulan);
                })->orWhere(function ($q) use ($bulan, $tahun) {
                    $q->whereYear('bus_datang', $tahun)
                        ->whereMonth('bus_datang', $bulan);
                });
            })
            ->orderBy('created_at', 'desc')
            ->get();

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
            'tanggal_cetak' => date('d-m-Y H:i')
        ];

        $pdf = Pdf::loadView('sistem_informasi.data_produksi.pdf', $data)
            ->setPaper('a4', 'landscape');

        $fileName = 'Data_Produksi_' . $bulanNama[$bulan] . '_' . $tahun . '.pdf';

        return $pdf->download($fileName);
    }

    public function rekapBulanan(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));

        // Method ini belum diimplementasikan dengan struktur tabel yang benar
        // Struktur tabel data_produksi menggunakan bus_berangkat, bus_datang, jml_pnp_berangkat, jml_pnp_datang

        return view('sistem_informasi.data_produksi.rekap_bulanan', compact('tahun'));
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
            $tanggalFormatted = sprintf('%d-%d-%04d', $day, $bulan, $tahun);

            // Get AKAP data (jenis_trayek = 'AKAP')
            $akapData = DataProduksi::with('dataMaster')
                ->whereHas('dataMaster', function ($q) {
                    $q->where('jenis_trayek', 'AKAP');
                })
                ->where(function ($query) use ($date) {
                    $query->whereDate('bus_berangkat', $date)
                        ->orWhereDate('bus_datang', $date);
                })
                ->get();

            // Get AKDP data (jenis_trayek = 'AKDP')
            $akdpData = DataProduksi::with('dataMaster')
                ->whereHas('dataMaster', function ($q) {
                    $q->where('jenis_trayek', 'AKDP');
                })
                ->where(function ($query) use ($date) {
                    $query->whereDate('bus_berangkat', $date)
                        ->orWhereDate('bus_datang', $date);
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
                if ($item->bus_datang && date('Y-m-d', strtotime($item->bus_datang)) === $date) {
                    $akap['bis_datang']++;
                    $akap['penumpang_datang'] += $item->jml_pnp_datang ?? 0;
                    $akap['penumpang_turun'] += $item->jml_pnp_datang ?? 0; // Assuming turun = datang
                }
                if ($item->bus_berangkat && date('Y-m-d', strtotime($item->bus_berangkat)) === $date) {
                    $akap['bis_berangkat']++;
                    $akap['penumpang_naik'] += $item->jml_pnp_berangkat ?? 0;
                    $akap['penumpang_berangkat'] += $item->jml_pnp_berangkat ?? 0; // Assuming berangkat = naik
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
                if ($item->bus_datang && date('Y-m-d', strtotime($item->bus_datang)) === $date) {
                    $akdp['bis_datang']++;
                    $akdp['penumpang_datang'] += $item->jml_pnp_datang ?? 0;
                    $akdp['penumpang_turun'] += $item->jml_pnp_datang ?? 0;
                }
                if ($item->bus_berangkat && date('Y-m-d', strtotime($item->bus_berangkat)) === $date) {
                    $akdp['bis_berangkat']++;
                    $akdp['penumpang_naik'] += $item->jml_pnp_berangkat ?? 0;
                    $akdp['penumpang_berangkat'] += $item->jml_pnp_berangkat ?? 0;
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
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));

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
            $tanggalFormatted = sprintf('%d-%d-%04d', $day, $bulan, $tahun);

            $akapData = DataProduksi::with('dataMaster')
                ->whereHas('dataMaster', function ($q) {
                    $q->where('jenis_trayek', 'AKAP');
                })
                ->where(function ($query) use ($date) {
                    $query->whereDate('bus_berangkat', $date)
                        ->orWhereDate('bus_datang', $date);
                })
                ->get();

            $akdpData = DataProduksi::with('dataMaster')
                ->whereHas('dataMaster', function ($q) {
                    $q->where('jenis_trayek', 'AKDP');
                })
                ->where(function ($query) use ($date) {
                    $query->whereDate('bus_berangkat', $date)
                        ->orWhereDate('bus_datang', $date);
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
                if ($item->bus_datang && date('Y-m-d', strtotime($item->bus_datang)) === $date) {
                    $akap['bis_datang']++;
                    $akap['penumpang_datang'] += $item->jml_pnp_datang ?? 0;
                    $akap['penumpang_turun'] += $item->jml_pnp_datang ?? 0;
                }
                if ($item->bus_berangkat && date('Y-m-d', strtotime($item->bus_berangkat)) === $date) {
                    $akap['bis_berangkat']++;
                    $akap['penumpang_naik'] += $item->jml_pnp_berangkat ?? 0;
                    $akap['penumpang_berangkat'] += $item->jml_pnp_berangkat ?? 0;
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
                if ($item->bus_datang && date('Y-m-d', strtotime($item->bus_datang)) === $date) {
                    $akdp['bis_datang']++;
                    $akdp['penumpang_datang'] += $item->jml_pnp_datang ?? 0;
                    $akdp['penumpang_turun'] += $item->jml_pnp_datang ?? 0;
                }
                if ($item->bus_berangkat && date('Y-m-d', strtotime($item->bus_berangkat)) === $date) {
                    $akdp['bis_berangkat']++;
                    $akdp['penumpang_naik'] += $item->jml_pnp_berangkat ?? 0;
                    $akdp['penumpang_berangkat'] += $item->jml_pnp_berangkat ?? 0;
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
            'bulan' => $bulanNama[$bulan],
            'tahun' => $tahun,
            'tanggal_cetak' => date('d-m-Y H:i')
        ];

        $pdf = Pdf::loadView('sistem_informasi.data_produksi.laporan_pdf', $data)
            ->setPaper('a4', 'landscape');

        $fileName = 'Laporan_Produksi_Harian_' . $bulanNama[$bulan] . '_' . $tahun . '.pdf';

        return $pdf->download($fileName);
    }
}
