<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    public function class() {
        return $this->belongsTo(Kelas::class, 'class_id')->withDefault();
    }

    public function qrCode() {
        return $this->belongsTo(qr_code::class, 'last_qr_code', 'id')->withDefault();
    }

}
