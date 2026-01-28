<?php

namespace App\Http\Controllers;

use App\Models\DataMaster;
use Illuminate\Http\Request;
use App\Imports\DataMasterImport;
use Maatwebsite\Excel\Facades\Excel;

class DataMasterController extends Controller
{
    public function index()
    {
        $dataMaster = DataMaster::orderBy('created_at', 'desc')->paginate(10);
        return view('sistem_informasi.data_master.index', compact('dataMaster'));
    }

    public function create()
    {
        return view('sistem_informasi.data_master.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kendaraan' => 'required|unique:data_master|max:10',
            'nama_po' => 'required|max:100',
            'jenis_trayek' => 'required|max:50',
            'asal_tujuan' => 'nullable|max:100',
            'data_trayek' => 'nullable|max:255',
            'provinsi' => 'nullable|max:50',
            'terminal_tujuan' => 'nullable|max:50',
            'kabupaten' => 'nullable|max:50',
        ]);

        DataMaster::create($request->all());

        return redirect()->route('datamaster.index')->with('success', 'Data Master berhasil ditambahkan!');
    }

    public function edit(DataMaster $dataMaster)
    {
        return view('sistem_informasi.data_master.edit', compact('dataMaster'));
    }

    public function update(Request $request, DataMaster $dataMaster)
    {
        $request->validate([
            'no_kendaraan' => 'required|max:10|unique:data_master,no_kendaraan,' . $dataMaster->id,
            'nama_po' => 'required|max:100',
            'jenis_trayek' => 'required|max:50',
            'asal_tujuan' => 'nullable|max:100',
            'data_trayek' => 'nullable|max:255',
            'provinsi' => 'nullable|max:50',
            'terminal_tujuan' => 'nullable|max:50',
            'kabupaten' => 'nullable|max:50',
        ]);

        $dataMaster->update($request->all());

        return redirect()->route('datamaster.index')->with('success', 'Data Master berhasil diupdate!');
    }

    public function destroy(DataMaster $dataMaster)
    {
        $noKendaraan = $dataMaster->no_kendaraan;
        $dataMaster->delete();

        return redirect()->route('datamaster.index')->with('success', "Data Master {$noKendaraan} berhasil dihapus!");
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048'
        ], [
            'file.required' => 'File Excel harus dipilih',
            'file.mimes' => 'File harus berformat Excel (xlsx, xls, atau csv)',
            'file.max' => 'Ukuran file maksimal 2MB'
        ]);

        try {
            $import = new DataMasterImport;
            Excel::import($import, $request->file('file'));

            return redirect()->route('datamaster.index')->with('success', 'Data berhasil diimport dari Excel! (Data duplikat otomatis dilewati)');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errorMessages = [];

            foreach ($failures as $failure) {
                $errorMessages[] = "Baris {$failure->row()}: " . implode(', ', $failure->errors());
            }

            return redirect()->back()->with('error', 'Import gagal: ' . implode(' | ', $errorMessages));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function removeDuplicates()
    {
        try {
            // Ambil semua no_kendaraan yang duplicate (tidak null dan tidak kosong)
            $duplicates = DataMaster::select('no_kendaraan')
                ->whereNotNull('no_kendaraan')
                ->where('no_kendaraan', '!=', '')
                ->groupBy('no_kendaraan')
                ->havingRaw('COUNT(*) > 1')
                ->pluck('no_kendaraan');

            if ($duplicates->isEmpty()) {
                return redirect()->route('datamaster.index')->with('info', 'Tidak ada data duplikat yang ditemukan.');
            }

            $totalDeleted = 0;

            foreach ($duplicates as $noKendaraan) {
                // Ambil semua data dengan no_kendaraan yang sama, urutkan dari yang tertua
                $records = DataMaster::where('no_kendaraan', $noKendaraan)
                    ->orderBy('created_at', 'asc')
                    ->orderBy('id', 'asc')
                    ->get();

                // Simpan yang pertama (paling lama), hapus sisanya
                if ($records->count() > 1) {
                    $records->skip(1)->each(function ($record) use (&$totalDeleted) {
                        $record->delete();
                        $totalDeleted++;
                    });
                }
            }

            if ($totalDeleted > 0) {
                return redirect()->route('datamaster.index')->with('success', "Berhasil menghapus {$totalDeleted} data duplikat dari " . $duplicates->count() . " No Kendaraan!");
            } else {
                return redirect()->route('datamaster.index')->with('info', 'Tidak ada data duplikat yang perlu dihapus.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
