<?php

namespace App\Imports;

use App\Models\DataMaster;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class DataMasterImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use SkipsErrors;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Normalisasi key untuk menangani berbagai format header
        $row = array_change_key_case($row, CASE_LOWER);

        // Mapping dengan fallback untuk berbagai nama kolom
        $noKendaraan = $row['no_kendaraan'] ?? $row['nomor_kendaraan'] ?? $row['no kendaraan'] ?? null;
        $namaPo = $row['nama_po'] ?? $row['nama po'] ?? null;

        // Skip baris jika no_kendaraan atau nama_po kosong
        if (empty($noKendaraan) || empty($namaPo)) {
            return null;
        }

        // Skip jika no_kendaraan sudah ada (cek duplikat)
        if (DataMaster::where('no_kendaraan', $noKendaraan)->exists()) {
            return null;
        }

        $dataTrayek = $row['data_trayek'] ?? $row['trayek'] ?? $row['data trayek'] ?? null;

        return new DataMaster([
            'no_kendaraan'    => $noKendaraan,
            'nama_po'         => $namaPo,
            'jenis_trayek'    => $row['jenis_trayek'] ?? $row['jenis trayek'] ?? null,
            'asal_tujuan'     => $row['asal_tujuan'] ?? $row['asal tujuan'] ?? null,
            'data_trayek'     => $dataTrayek,
            'provinsi'        => $row['provinsi'] ?? null,
            'terminal_tujuan' => $row['terminal_tujuan'] ?? $row['terminal tujuan'] ?? null,
            'kabupaten'       => $row['kabupaten'] ?? null,
        ]);
    }
}
