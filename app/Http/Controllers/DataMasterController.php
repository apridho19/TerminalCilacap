<?php

namespace App\Http\Controllers;

use App\Models\DataMaster;
use Illuminate\Http\Request;

class DataMasterController extends Controller
{
    public function index()
    {
        $dataMaster = DataMaster::all();
        return view('sistem_informasi.datamaster', compact('dataMaster'));
    }

    public function create()
    {
        return view('sistem_informasi.create_datamaster');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kendaraan' => 'required|unique:data_master|max:10',
            'nama_po' => 'required|max:100',
            'jenis_trayek' => 'required|max:50',
            'asal_tujuan' => 'required|nullable|max:100',
            'data_trayek' => 'required|nullable|max:255',
            'provinsi' => 'required|nullable|max:50',
            'terminal_tujuan' => 'required|nullable|max:50',
            'kabupaten' => 'required|nullable|max:50',
        ]);

        DataMaster::create($request->all());

        return redirect()->route('datamaster.index')->with('success', 'Data Master created successfully.');
    }

    public function edit(DataMaster $dataMaster)
    {
        return view('sistem_informasi.edit_datamaster', compact('dataMaster'));
    }

    public function update(Request $request, DataMaster $dataMaster)
    {
        $request->validate([
            'no_kendaraan' => 'required|max:10|unique:data_master,no_kendaraan,' . $dataMaster->id,
            'nama_po' => 'required|max:100',
            'jenis_trayek' => 'required|max:50',
            'asal_tujuan' => 'required|nullable|max:100',
            'data_trayek' => 'required|nullable|max:255',
            'provinsi' => 'required|nullable|max:50',
            'terminal_tujuan' => 'required|nullable|max:50',
            'kabupaten' => 'required|nullable|max:50',
        ]);

        $dataMaster->update($request->all());

        return redirect()->route('datamaster.index')->with('success', 'Data Master updated successfully.');
    }

    public function destroy(DataMaster $dataMaster)
    {
        $dataMaster->delete();

        return redirect()->route('datamaster.index')->with('success', 'Data Master deleted successfully.');
    }
}
