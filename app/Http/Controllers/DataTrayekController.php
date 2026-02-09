<?php

namespace App\Http\Controllers;

use App\Models\DataMaster;
use Illuminate\Http\Request;

class DataTrayekController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai filter dari request
        $jenisTrayek = $request->input('jenis_trayek');
        $asalTujuan = $request->input('asal_tujuan');
        $provinsi = $request->input('provinsi');
        $terminalTujuan = $request->input('terminal_tujuan');
        $kabupaten = $request->input('kabupaten');
        $tanggal = $request->input('tanggal');

        // Query dengan filter
        $query = DataMaster::query();

        // Apply filter
        if ($jenisTrayek) {
            $query->where('jenis_trayek', $jenisTrayek);
        }

        if ($asalTujuan) {
            $query->where('asal_tujuan', $asalTujuan);
        }

        if ($provinsi) {
            $query->where('provinsi', $provinsi);
        }

        if ($terminalTujuan) {
            $query->where('terminal_tujuan', $terminalTujuan);
        }

        if ($kabupaten) {
            $query->where('kabupaten', $kabupaten);
        }

        // Ambil data dengan pagination
        $dataTrayek = $query->orderBy('nama_po', 'asc')->paginate(20);

        // Ambil data unik untuk filter dropdown
        $filterData = DataMaster::select('jenis_trayek', 'asal_tujuan', 'provinsi', 'terminal_tujuan', 'kabupaten')
            ->distinct()
            ->get();

        $jenisTrayekList = $filterData->pluck('jenis_trayek')->unique()->sort()->values();
        $asalTujuanList = $filterData->pluck('asal_tujuan')->unique()->sort()->values();
        $provinsiList = $filterData->pluck('provinsi')->unique()->sort()->values();
        $terminalTujuanList = $filterData->pluck('terminal_tujuan')->unique()->sort()->values();
        $kabupatenList = $filterData->pluck('kabupaten')->unique()->sort()->values();

        // Hitung total jumlah penumpang berdasarkan jenis trayek
        $totalData = DataMaster::query();

        if ($jenisTrayek) {
            $totalData->where('jenis_trayek', $jenisTrayek);
        }
        if ($asalTujuan) {
            $totalData->where('asal_tujuan', $asalTujuan);
        }
        if ($provinsi) {
            $totalData->where('provinsi', $provinsi);
        }
        if ($terminalTujuan) {
            $totalData->where('terminal_tujuan', $terminalTujuan);
        }
        if ($kabupaten) {
            $totalData->where('kabupaten', $kabupaten);
        }

        // Hitung berdasarkan jenis trayek
        $totalAKAP = (clone $totalData)->where('jenis_trayek', 'AKAP')->count();
        $totalAKDP = (clone $totalData)->where('jenis_trayek', 'AKDP')->count();
        $totalKeseluruhan = $totalData->count();

        return view('landing_page.data_trayek', compact(
            'dataTrayek',
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
            'tanggal',
            'totalAKAP',
            'totalAKDP',
            'totalKeseluruhan'
        ));
    }
}
