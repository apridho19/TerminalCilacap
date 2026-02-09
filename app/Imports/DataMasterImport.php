<?php

namespace App\Imports;

use App\Models\DataMaster;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Illuminate\Support\Facades\Log;

class DataMasterImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use SkipsErrors;

    private $successCount = 0;
    private $skipCount = 0;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Log raw row untuk debugging (hanya baris pertama)
        if ($this->successCount === 0 && $this->skipCount === 0) {
            Log::info('DataMasterImport - Format header Excel:', array_keys($row));
        }

        // Normalisasi key untuk menangani berbagai format header
        $row = array_change_key_case($row, CASE_LOWER);

        // Hapus spasi berlebih pada semua key
        $normalizedRow = [];
        foreach ($row as $key => $value) {
            $normalizedKey = str_replace([' ', '_'], '', strtolower(trim($key)));
            $normalizedRow[$normalizedKey] = is_string($value) ? trim($value) : $value;
        }

        // Mapping dengan berbagai variasi nama kolom
        $noKendaraan = $this->getValue($normalizedRow, ['nokendaraan', 'nomorkendaraan', 'nopol', 'nopolisi']);
        $namaPo = $this->getValue($normalizedRow, ['namapo', 'po', 'namaoperator', 'operator']);

        // Skip baris jika no_kendaraan atau nama_po kosong
        if (empty($noKendaraan) || empty($namaPo)) {
            $this->skipCount++;
            Log::info("DataMasterImport - Baris dilewati (data kosong): ", [
                'no_kendaraan' => $noKendaraan,
                'nama_po' => $namaPo
            ]);
            return null;
        }

        // Skip jika no_kendaraan sudah ada (cek duplikat)
        if (DataMaster::where('no_kendaraan', $noKendaraan)->exists()) {
            $this->skipCount++;
            Log::info("DataMasterImport - Baris dilewati (duplikat): {$noKendaraan}");
            return null;
        }

        $this->successCount++;

        return new DataMaster([
            'no_kendaraan'    => $noKendaraan,
            'nama_po'         => $namaPo,
            'jenis_trayek'    => $this->getValue($normalizedRow, ['jenistrayek', 'trayek', 'jenis']),
            'asal_tujuan'     => $this->getValue($normalizedRow, ['asaltujuan', 'rute', 'tujuan']),
            'data_trayek'     => $this->getValue($normalizedRow, ['datatrayek', 'keterangan', 'ket']),
            'provinsi'        => $this->getValue($normalizedRow, ['provinsi', 'prov']),
            'terminal_tujuan' => $this->getValue($normalizedRow, ['terminaltujuan', 'terminal']),
            'kabupaten'       => $this->getValue($normalizedRow, ['kabupaten', 'kab', 'kabkota']),
        ]);
    }

    /**
     * Helper function untuk mendapatkan nilai dari berbagai key alternatif
     */
    private function getValue($row, $keys)
    {
        foreach ($keys as $key) {
            if (isset($row[$key]) && !empty($row[$key])) {
                return $row[$key];
            }
        }
        return null;
    }

    public function getSuccessCount()
    {
        return $this->successCount;
    }

    public function getSkipCount()
    {
        return $this->skipCount;
    }
}
