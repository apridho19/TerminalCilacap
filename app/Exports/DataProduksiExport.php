<?php

namespace App\Exports;

use App\Models\DataProduksi;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DataProduksiExport implements FromArray, WithHeadings, WithStyles, WithTitle
{
    protected $bulan;
    protected $tahun;

    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function array(): array
    {
        // Ambil semua data produksi berdasarkan bulan dan tahun
        $allData = DataProduksi::with('dataMaster')
            ->where(function ($query) {
                $query->where(function ($q) {
                    $q->whereYear('bus_berangkat', $this->tahun)
                        ->whereMonth('bus_berangkat', $this->bulan);
                })->orWhere(function ($q) {
                    $q->whereYear('bus_datang', $this->tahun)
                        ->whereMonth('bus_datang', $this->bulan);
                });
            })
            ->orderBy('created_at', 'desc')
            ->get();

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
                    $dataProduksi[] = (object)[
                        'dataMaster' => $berangkat->dataMaster,
                        'no_kendaraan' => $berangkat->no_kendaraan,
                        'jml_pnp_berangkat' => $berangkat->jml_pnp_berangkat,
                        'waktu_berangkat' => $berangkat->waktu_berangkat,
                        'bus_berangkat' => $berangkat->bus_berangkat,
                        'jml_pnp_datang' => $bestMatch->jml_pnp_datang,
                        'waktu_datang' => $bestMatch->waktu_datang,
                        'bus_datang' => $bestMatch->bus_datang,
                    ];
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

        // Convert to array format for Excel
        $result = [];
        $no = 1;
        foreach ($dataProduksi as $produksi) {
            $result[] = [
                $no++,
                $produksi->dataMaster->nama_po ?? '-',
                $produksi->no_kendaraan,
                $produksi->dataMaster->jenis_trayek ?? '-',
                $produksi->dataMaster->asal_tujuan ?? '-',
                $produksi->dataMaster->data_trayek ?? '-',
                $produksi->dataMaster->provinsi ?? '-',
                $produksi->dataMaster->terminal_tujuan ?? '-',
                $produksi->dataMaster->kabupaten ?? '-',
                $produksi->jml_pnp_berangkat ?? '-',
                $produksi->waktu_berangkat ? \Carbon\Carbon::parse($produksi->waktu_berangkat)->format('H:i') : '-',
                $produksi->bus_berangkat ? \Carbon\Carbon::parse($produksi->bus_berangkat)->format('d-m-Y') : '-',
                $produksi->jml_pnp_datang ?? '-',
                $produksi->waktu_datang ? \Carbon\Carbon::parse($produksi->waktu_datang)->format('H:i') : '-',
                $produksi->bus_datang ? \Carbon\Carbon::parse($produksi->bus_datang)->format('d-m-Y') : '-',
            ];
        }

        return $result;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama PO',
            'No Kendaraan',
            'Jenis Trayek',
            'Asal - Tujuan',
            'Data Trayek',
            'Provinsi',
            'Terminal Tujuan',
            'Kabupaten',
            'Jumlah Penumpang Berangkat',
            'Waktu Berangkat',
            'Tanggal Berangkat',
            'Jumlah Penumpang Datang',
            'Waktu Datang',
            'Tanggal Datang',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function title(): string
    {
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

        return 'Data Produksi ' . $bulanNama[$this->bulan] . ' ' . $this->tahun;
    }
}
