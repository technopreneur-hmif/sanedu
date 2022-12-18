<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_presensi',
        'tanggal_presensi',
        'hari',
        'waktu_masuk',
        'waktu_submit',
        'keterangan',
        'wa_user'
    ];
}
