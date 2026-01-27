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

        // Kedatangan hari ini (termasuk yang berangkat kemarin tapi datang hari ini)
        $kedatanganHariIni = DataProduksi::whereNotNull('waktu_datang')
            ->whereDate('bus_datang', $today)
            ->count();

        // Total penumpang hari ini
        $totalPenumpangBerangkat = DataProduksi::whereNotNull('waktu_berangkat')
            ->whereDate('bus_berangkat', $today)
            ->sum('jml_pnp_berangkat');

        $totalPenumpangDatang = DataProduksi::whereNotNull('waktu_datang')
            ->whereDate('bus_datang', $today)
            ->sum('jml_pnp_datang');

        // Data keberangkatan terbaru hari ini
        $keberangkatanTerbaru = DataProduksi::with('dataMaster')
            ->whereNotNull('waktu_berangkat')
            ->whereDate('bus_berangkat', $today)
            ->orderBy('waktu_berangkat', 'desc')
            ->take(5)
            ->get();

        // Data kedatangan terbaru hari ini
        $kedatanganTerbaru = DataProduksi::with('dataMaster')
            ->whereNotNull('waktu_datang')
            ->whereDate('bus_datang', $today)
            ->orderBy('waktu_datang', 'desc')
            ->take(5)
            ->get();

        // Data untuk grafik - 7 hari terakhir
        $dataGrafik = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $dataGrafik['labels'][] = date('d/m', strtotime($date));
            $dataGrafik['keberangkatan'][] = DataProduksi::whereNotNull('waktu_berangkat')
                ->whereDate('bus_berangkat', $date)
                ->count();
            $dataGrafik['kedatangan'][] = DataProduksi::whereNotNull('waktu_datang')
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
