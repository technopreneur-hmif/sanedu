<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_pembayaran',
        'tanggal_pembayaran',
        'nominal',
        'pembayaran_ke',
        'status',
        'bukti_pembayaran',
        'keterangan',
        'wa_user',
        'approved_at',
    ];

    public function student() {
        return $this->belongsTo(User::class, 'wa_user', 'wa_user')->withDefault();
    }
}
