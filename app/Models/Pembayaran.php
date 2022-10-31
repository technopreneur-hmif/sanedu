<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pembayaran',
        'tanggal_pembayaran',
        'nominal',
        'pembayaran_ke',
        'status',
        'bukti_pembayaran',
        'keterangan'
    ];
}
