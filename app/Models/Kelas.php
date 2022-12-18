<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'id',
        'nama_kelas',
        'jumlah',
        'last_qr_code',
    ];
    use HasFactory;

    public function meeting() {
        return $this->hasOne(Meeting::class, 'class_id')->withDefault();
    }
}
