<?php

namespace App\Http\Controllers;

use App\Models\DataProduksi;
use App\Models\DataMaster;
use Illuminate\Http\Request;

class KedatanganController extends Controller
{
    public function index()
    {
        // Hanya tampilkan data yang memiliki waktu_datang (dari form kedatangan)
        $dataProduksi = DataProduksi::with('dataMaster')
            ->whereNotNull('waktu_datang')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        $dataMaster = DataMaster::all();
        return view('sistem_informasi.kedatangan.index', compact('dataProduksi', 'dataMaster'));
    }

    public function create()
    {
        return view('sistem_informasi.kedatangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_master_id' => 'required|exists:data_master,id',
            'no_kendaraan' => 'required|string|max:255',
            'jml_pnp_datang' => 'required|integer|min:0',
            'waktu_datang' => 'required|date_format:H:i',
        ], [
            'data_master_id.required' => 'No kendaraan tidak ditemukan di data master. Pastikan no kendaraan sudah terdaftar.',
            'data_master_id.exists' => 'No kendaraan tidak valid atau belum terdaftar di data master.',
        ]);

        // Set tanggal bus_datang otomatis dengan tanggal hari ini
        $data = $request->all();
        $data['bus_datang'] = date('Y-m-d');

        DataProduksi::create($data);

        return redirect()->route('kedatangan.index')->with('success', 'Data kedatangan berhasil ditambahkan.');
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
