<?php

namespace App\Http\Controllers;

use App\Models\DataProduksi;
use App\Models\DataMaster;
use Illuminate\Http\Request;

class KeberangkatanController extends Controller
{
    public function index()
    {
        // Hanya tampilkan data yang memiliki waktu_berangkat (dari form keberangkatan)
        $dataProduksi = DataProduksi::with('dataMaster')
            ->whereNotNull('waktu_berangkat')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        $dataMaster = DataMaster::all();
        return view('sistem_informasi.keberangkatan.index', compact('dataProduksi', 'dataMaster'));
    }

    public function create()
    {
        return view('sistem_informasi.keberangkatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_master_id' => 'required|exists:data_master,id',
            'no_kendaraan' => 'required|string|max:255',
            'jml_pnp_berangkat' => 'required|integer|min:0',
            'waktu_berangkat' => 'required|date_format:H:i',
        ], [
            'data_master_id.required' => 'No kendaraan tidak ditemukan di data master. Pastikan no kendaraan sudah terdaftar.',
            'data_master_id.exists' => 'No kendaraan tidak valid atau belum terdaftar di data master.',
        ]);

        // Set tanggal bus_berangkat otomatis dengan tanggal hari ini
        $data = $request->all();
        $data['bus_berangkat'] = date('Y-m-d');

        DataProduksi::create($data);

        return redirect()->route('keberangkatan.index')->with('success', 'Data keberangkatan berhasil ditambahkan.');
    }

    public function checkKendaraan($no_kendaraan)
    {
        $dataMaster = DataMaster::where('no_kendaraan', $no_kendaraan)->first();

        if ($dataMaster) {
            return response()->json([
                'found' => true,
                'data' => $dataMaster
            ]);
        }

        return response()->json([
            'found' => false,
            'message' => 'No kendaraan tidak ditemukan di data master'
        ]);
    }
}
