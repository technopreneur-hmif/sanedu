<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qr_code extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function presensis() {
        return $this->hasMany(Presensi::class, 'qr_code_id');
    }
}
