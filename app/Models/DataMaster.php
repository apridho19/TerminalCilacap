<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMaster extends Model
{
    use HasFactory;

    protected $table = 'data_master';

    protected $fillable = [
        'no_kendaraan',
        'nama_po',
        'jenis_trayek',
        'asal_tujuan',
        'data_trayek',
        'provinsi',
        'terminal_tujuan',
        'kabupaten',
    ];
}
