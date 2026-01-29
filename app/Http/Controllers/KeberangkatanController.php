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
            ->paginate(30);
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
            'no_kendaraan' => 'required|string|max:255',
            'jml_pnp_berangkat' => 'required|integer|min:0',
            'waktu_berangkat' => 'required|date_format:H:i',
            'nama_po' => 'nullable|string|max:100',
            'jenis_trayek' => 'nullable|string|max:50',
            'data_trayek' => 'nullable|string|max:255',
            'asal_tujuan' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:50',
            'terminal_tujuan' => 'nullable|string|max:50',
            'kabupaten' => 'nullable|string|max:50',
        ]);

        // Cek apakah kendaraan sudah ada di data master
        $dataMaster = DataMaster::where('no_kendaraan', strtoupper($request->no_kendaraan))->first();
        $isNewVehicle = false;

        // Jika tidak ada, buat data master baru dengan data yang diinput user
        if (!$dataMaster) {
            $dataMaster = DataMaster::create([
                'no_kendaraan' => strtoupper($request->no_kendaraan),
                'nama_po' => $request->nama_po ?: 'Belum Diisi',
                'jenis_trayek' => $request->jenis_trayek ?: 'Belum Diisi',
                'asal_tujuan' => $request->asal_tujuan ?: '-',
                'data_trayek' => $request->data_trayek ?: '-',
                'provinsi' => $request->provinsi ?: '-',
                'terminal_tujuan' => $request->terminal_tujuan ?: '-',
                'kabupaten' => $request->kabupaten ?: '-',
            ]);
            $isNewVehicle = true;
        }

        // Set tanggal bus_berangkat otomatis dengan tanggal hari ini
        $data = [
            'data_master_id' => $dataMaster->id,
            'no_kendaraan' => strtoupper($request->no_kendaraan),
            'jml_pnp_berangkat' => $request->jml_pnp_berangkat,
            'waktu_berangkat' => $request->waktu_berangkat,
            'bus_berangkat' => date('Y-m-d'),
        ];

        DataProduksi::create($data);

        // Hanya tampilkan notif data master jika kendaraan benar-benar baru ditambahkan
        if ($isNewVehicle) {
            return redirect()->route('keberangkatan.index')->with('success', "Data keberangkatan berhasil ditambahkan. Kendaraan {$request->no_kendaraan} berhasil ditambahkan ke data master.");
        }

        return redirect()->route('keberangkatan.index')->with('success', 'Data keberangkatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dataProduksi = DataProduksi::with('dataMaster')->findOrFail($id);
        return view('sistem_informasi.keberangkatan.edit', compact('dataProduksi'));
    }

    public function update(Request $request, $id)
    {
        $dataProduksi = DataProduksi::findOrFail($id);

        $request->validate([
            'no_kendaraan' => 'required|string|max:255',
            'jml_pnp_berangkat' => 'required|integer|min:0',
            'waktu_berangkat' => 'required|date_format:H:i',
        ]);

        // Cek apakah kendaraan sudah ada di data master
        $dataMaster = DataMaster::where('no_kendaraan', $request->no_kendaraan)->first();

        // Jika tidak ada, buat data master baru otomatis
        if (!$dataMaster) {
            $dataMaster = DataMaster::create([
                'no_kendaraan' => strtoupper($request->no_kendaraan),
                'nama_po' => 'Belum Diisi',
                'jenis_trayek' => 'Belum Diisi',
                'asal_tujuan' => '-',
                'data_trayek' => '-',
                'provinsi' => '-',
                'terminal_tujuan' => '-',
                'kabupaten' => '-',
            ]);
        }

        $data = $request->all();
        $data['data_master_id'] = $dataMaster->id;

        $dataProduksi->update($data);

        return redirect()->route('keberangkatan.index')->with('success', "Data keberangkatan {$dataProduksi->no_kendaraan} berhasil diupdate!");
    }

    public function destroy($id)
    {
        // Cek role user
        if (auth()->user()->role === 'pegawai') {
            return redirect()->route('keberangkatan.index')->with('error', 'Anda tidak memiliki akses untuk menghapus data!');
        }

        $dataProduksi = DataProduksi::findOrFail($id);
        $noKendaraan = $dataProduksi->no_kendaraan;
        $dataProduksi->delete();

        return redirect()->route('keberangkatan.index')->with('success', "Data keberangkatan {$noKendaraan} berhasil dihapus!");
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
