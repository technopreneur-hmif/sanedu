<?php

namespace App\Http\Controllers;

use App\Models\Nominal;
use App\Models\Pembayaran;
use App\Models\Presensi;
use App\Models\Ujian;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function riwayat_pembayaran(Request $request){
        if($request->roles=='1'){
            $client = User::where('wa_user',$request->no_wa)->where('roles_id','1')->first();
            $password = $request->password;
            $siswa = User::where('wa_siswa',null)->get();
            $bayar = Pembayaran::where('wa_user',$request->no_wa)->get();
            $nominal = Nominal::where('wa_user',$request->no_wa)->first();
            $pembayaran = Pembayaran::where('wa_user',$request->no_wa)->first();
            return view('client.riwayat-pembayaran',compact('client','siswa','bayar','pembayaran','password','nominal'));
        }else{
            $client = User::where('wa_user',$request->no_wa)->where('roles_id','2')->first();
            $ortu = User::where('wa_siswa',$client->wa_user)->first();
            $password = $request->password;
            $bayar = Pembayaran::where('wa_user',$request->wa_user)->get();
            $nominal = Nominal::where('wa_user',$ortu->wa_user)->first();
            $pembayaran = Pembayaran::where('wa_user',$ortu->wa_user)->first();
            return view('client.riwayat-pembayaran',compact('client','bayar','pembayaran','password','nominal'));
        }
    }

    public function riwayat_ujian(Request $request){
        if($request->roles=='1'){
            $client = User::where('wa_user',$request->no_wa)->where('roles_id','1')->first();
            $password = $request->password;
            $siswa = User::where('wa_siswa',null)->get();
            $ujian = Ujian::where('wa_user',$request->no_wa)->get();;
            $nominal = Nominal::where('wa_user',$request->no_wa)->first();
            $pembayaran = Pembayaran::where('wa_user',$request->no_wa)->first();
            return view('client.riwayat-ujian',compact('client','siswa','ujian','password','nominal','pembayaran'));
        }else{
            $client = User::where('wa_user',$request->no_wa)->where('roles_id','2')->first();
            $ortu = User::where('wa_siswa',$client->wa_user)->first();
            $password = $request->password;
            $ujian = Ujian::where('wa_user',$request->wa_user)->get();
            $nominal = Nominal::where('wa_user',$ortu->wa_user)->first();
            $pembayaran = Pembayaran::where('wa_user',$ortu->wa_user)->first();
            return view('client.riwayat-ujian',compact('client','ujian','password','nominal','pembayaran'));
        }
    }
}
