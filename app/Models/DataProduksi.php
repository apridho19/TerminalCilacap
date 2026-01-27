<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProduksi extends Model
{
    use HasFactory;

    protected $table = 'data_produksi';

    protected $fillable = [
        'no_kendaraan',
        'jml_pnp_berangkat',
        'waktu_berangkat',
        'bus_berangkat',
        'data_master_id',
        'jml_pnp_datang',
        'waktu_datang',
        'bus_datang'
    ];

    public function dataMaster()
    {
        return $this->belongsTo(DataMaster::class, 'data_master_id');
    }
}
