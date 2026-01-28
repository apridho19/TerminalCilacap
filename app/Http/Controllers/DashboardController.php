<?php

namespace App\Http\Controllers;

use App\Models\DataProduksi;
use App\Models\DataMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data
        $totalKendaraan = DataMaster::count();
        $totalKeberangkatan = DataProduksi::whereNotNull('waktu_berangkat')->count();
        $totalKedatangan = DataProduksi::whereNotNull('waktu_datang')->count();

        // Data hari ini (termasuk yang melewati tengah malam)
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));

        // Keberangkatan hari ini
        $keberangkatanHariIni = DataProduksi::whereNotNull('waktu_berangkat')
            ->whereDate('bus_berangkat', $today)
            ->count();

        // Kedatangan hari ini = hitung bus yang datang hari ini (bukan yang berangkat)
        $kedatanganHariIni = DataProduksi::whereNotNull('waktu_datang')
            ->whereNull('waktu_berangkat') // Hanya data kedatangan saja
            ->whereDate('bus_datang', $today)
            ->count();

        // Total penumpang hari ini
        $totalPenumpangBerangkat = DataProduksi::whereNotNull('waktu_berangkat')
            ->whereDate('bus_berangkat', $today)
            ->sum('jml_pnp_berangkat');

        // Ambil data penumpang datang dari pairing
        $keberangkatanHariIniData = DataProduksi::whereNotNull('waktu_berangkat')
            ->whereDate('bus_berangkat', $today)
            ->get();

        $totalPenumpangDatang = 0;
        foreach ($keberangkatanHariIniData as $berangkat) {
            // Cari kedatangan terdekat dengan no_kendaraan sama
            $kedatangan = DataProduksi::where('no_kendaraan', $berangkat->no_kendaraan)
                ->whereNotNull('waktu_datang')
                ->whereNull('waktu_berangkat')
                ->where('bus_datang', '<=', $berangkat->bus_berangkat)
                ->orderBy('bus_datang', 'desc')
                ->first();

            if ($kedatangan) {
                $totalPenumpangDatang += $kedatangan->jml_pnp_datang ?? 0;
            }
        }

        // Data keberangkatan terbaru hari ini
        $keberangkatanTerbaru = DataProduksi::with('dataMaster')
            ->whereNotNull('waktu_berangkat')
            ->whereDate('bus_berangkat', $today)
            ->orderBy('waktu_berangkat', 'desc')
            ->take(5)
            ->get();

        // Data kedatangan terbaru = ambil dari keberangkatan hari ini lalu cari data kedatangannya
        $keberangkatanTerbaruData = DataProduksi::with('dataMaster')
            ->whereNotNull('waktu_berangkat')
            ->whereDate('bus_berangkat', $today)
            ->orderBy('waktu_berangkat', 'desc')
            ->take(5)
            ->get();

        $kedatanganTerbaru = [];
        foreach ($keberangkatanTerbaruData as $berangkat) {
            $kedatangan = DataProduksi::where('no_kendaraan', $berangkat->no_kendaraan)
                ->whereNotNull('waktu_datang')
                ->whereNull('waktu_berangkat')
                ->where('bus_datang', '<=', $berangkat->bus_berangkat)
                ->orderBy('bus_datang', 'desc')
                ->first();

            if ($kedatangan) {
                $combined = (object)[
                    'no_kendaraan' => $berangkat->no_kendaraan,
                    'dataMaster' => $berangkat->dataMaster,
                    'waktu_datang' => $kedatangan->waktu_datang,
                    'jml_pnp_datang' => $kedatangan->jml_pnp_datang,
                    'bus_datang' => $kedatangan->bus_datang,
                ];
                $kedatanganTerbaru[] = $combined;
            }
        }

        // Data untuk grafik - 7 hari terakhir
        $dataGrafik = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $dateBefore = date('Y-m-d', strtotime("-" . ($i + 1) . " days"));
            $dataGrafik['labels'][] = date('d/m', strtotime($date));
            $dataGrafik['keberangkatan'][] = DataProduksi::whereNotNull('waktu_berangkat')
                ->whereDate('bus_berangkat', $date)
                ->count();
            // Kedatangan = hitung bus yang datang pada tanggal tersebut
            $dataGrafik['kedatangan'][] = DataProduksi::whereNotNull('waktu_datang')
                ->whereNull('waktu_berangkat')
                ->whereDate('bus_datang', $date)
                ->count();
        }

        // Data untuk pie chart - berdasarkan jenis trayek
        $dataPieChart = DataMaster::select('jenis_trayek', DB::raw('count(*) as total'))
            ->groupBy('jenis_trayek')
            ->get();

        return view('sistem_informasi.dashboard', compact(
            'totalKendaraan',
            'totalKeberangkatan',
            'totalKedatangan',
            'keberangkatanHariIni',
            'kedatanganHariIni',
            'totalPenumpangBerangkat',
            'totalPenumpangDatang',
            'keberangkatanTerbaru',
            'kedatanganTerbaru',
            'dataGrafik',
            'dataPieChart'
        ));
    }
}
