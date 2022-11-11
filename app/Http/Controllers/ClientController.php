<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Presensi;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function riwayat_pembayaran(){
        $pembayaran = Pembayaran::all();
        return view('client.riwayat-pembayaran',compact('pembayaran'));
    }

    public function riwayat_ujian(){
        $ujian = Presensi::all();
        return view('client.riwayat-ujian',compact('ujian'));
    }
}
