<?php

namespace App\Http\Controllers;

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
            $pembayaran = Pembayaran::all();
            return view('client.riwayat-pembayaran',compact('client','siswa','pembayaran','password'));
        }else{
            $client = User::where('wa_user',$request->no_wa)->where('roles_id','2')->first();
            $password = $request->password;
            $pembayaran = Pembayaran::all();
            return view('client.riwayat-pembayaran',compact('client','pembayaran','password'));
        }
    }

    public function riwayat_ujian(Request $request){
        if($request->roles=='1'){
            $client = User::where('wa_user',$request->no_wa)->where('roles_id','1')->first();
            $password = $request->password;
            $siswa = User::where('wa_siswa',null)->get();
            $ujian = Ujian::all();
            return view('client.riwayat-ujian',compact('client','siswa','ujian','password'));
        }else{
            $client = User::where('wa_user',$request->no_wa)->where('roles_id','2')->first();
            $password = $request->password;
            $ujian = Ujian::all();
            return view('client.riwayat-ujian',compact('client','ujian','password'));
        }
    }
}
