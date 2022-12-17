<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    use HasFactory;

    public function classPayment() {
        return $this->belongsTo(Pembayaran::class, 'transaction_id', 'id_pembayaran')->withDefault();
  }
}
