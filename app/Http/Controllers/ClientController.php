<?php

namespace App\Http\Controllers;

use App\Models\Nominal;
use App\Models\Pembayaran;
use App\Models\Presensi;
use App\Models\qr_code;
use App\Models\Status;
use App\Models\Ujian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ClientController extends Controller
{
    public function riwayat_pembayaran(Request $request){
        $status = Status::all();
        if($request->roles=='2'){
            $client = User::where('wa_user',$request->no_wa)->where('roles_id','2')->first();
            $password = $request->password;
            $siswa = User::where('wa_siswa',null)->get();
            $bayar = Pembayaran::where('wa_user',$request->no_wa)->get();
            $nominal = Nominal::where('wa_user',$request->no_wa)->first();
            $pembayaran = Pembayaran::where('wa_user',$request->no_wa)->where('status','1')->get();
            $total = 0;
                if($nominal !=null){
                    foreach($pembayaran as $pem){
                        $total = $total + $pem->nominal;
                    }
                    $kekurangan = $nominal->nominal - $total;
                }else{
                    $nominal = 0;
                    $kekurangan = 0;
                }
            return view('client.riwayat-pembayaran',compact('client','siswa','total','bayar','pembayaran','password','nominal','kekurangan','status'));
        }else{
            $client = User::where('wa_user',$request->no_wa)->where('roles_id','1')->first();
            $siswa = User::where('wa_user',$client->wa_siswa)->first();
            $ortu = User::where('wa_siswa',$client->wa_user)->first();
            $password = $request->password;
            $bayar = Pembayaran::where('wa_user',$client->wa_siswa)->get();
            $nominal = Nominal::where('wa_user',$client->wa_siswa)->first();
            $pembayaran = Pembayaran::where('wa_user',$client->wa_siswa)->where('status','1')->get();
            $total = 0;
                if($nominal !=null){
                    foreach($pembayaran as $pem){
                        $total = $total + $pem->nominal;
                    }
                    $kekurangan = $nominal->nominal - $total;
                }else{
                    $nominal = 0;
                    $kekurangan = 0;
                }
            return view('client.riwayat-pembayaran',compact('client','siswa','bayar','total','pembayaran','password','nominal','kekurangan','status'));
        }
    }

    public function riwayat_ujian(Request $request){
        if($request->roles=='2'){
            $client = User::where('wa_user',$request->no_wa)->where('roles_id','2')->first();
            $password = $request->password;
            $siswa = User::where('wa_siswa',null)->get();
            $ujian = Ujian::where('wa_user',$request->no_wa)->get();;
            $nominal = Nominal::where('wa_user',$request->no_wa)->first();
            $pembayaran = Pembayaran::where('wa_user',$request->no_wa)->where('status','1')->get();
            $total = 0;
                if($nominal !=null){
                    foreach($pembayaran as $pem){
                        $total = $total + $pem->nominal;
                    }
                    $kekurangan = $nominal->nominal - $total;
                }else{
                    $nominal = 0;
                    $kekurangan = 0;
                }
            return view('client.riwayat-ujian',compact('client','siswa','total','ujian','password','nominal','pembayaran','kekurangan'));
        }else{
            $client = User::where('wa_user',$request->no_wa)->where('roles_id','1')->first();
            $siswa = User::where('wa_user',$client->wa_siswa)->first();
            $ortu = User::where('wa_siswa',$client->wa_user)->first();
            $password = $request->password;
            $ujian = Ujian::where('wa_user',$request->wa_user)->get();
            $nominal = Nominal::where('wa_user',$client->wa_siswa)->first();
            $pembayaran = Pembayaran::where('wa_user',$client->wa_siswa)->where('status','1')->get();
            $total = 0;
                if($nominal !=null){
                    foreach($pembayaran as $pem){
                        $total = $total + $pem->nominal;
                    }
                    $kekurangan = $nominal->nominal - $total;
                }else{
                    $nominal = 0;
                    $kekurangan = 0;
                }
            return view('client.riwayat-ujian',compact('client','siswa','total','ujian','password','nominal','pembayaran','kekurangan'));
        }
    }

    public function pembayaran($id){
        $akun = User::where('wa_siswa',$id)->first();
        if($akun==null){
            $akun = User::where('wa_user',$id)->first();
        }
        if($akun->roles_id=='1'){
            $nominal = Nominal::where('wa_user',$akun->wa_siswa)->first();
            $pembayaran = Pembayaran::where('wa_user',$akun->wa_siswa)->where('status','1')->get();
            $total = 0;
                if($nominal !=null){
                    foreach($pembayaran as $pem){
                        $total = $total + $pem->nominal;
                    }
                    $kekurangan = $nominal->nominal - $total;
                }else{
                    $nominal = 0;
                    $kekurangan = 0;
                }
        }else{
            $nominal = Nominal::where('wa_user',$akun->wa_siswa)->first();
            $pembayaran = Pembayaran::where('wa_user',$akun->wa_siswa)->where('status','1')->get();
            $total = 0;
                if($nominal !=null){
                    foreach($pembayaran as $pem){
                        $total = $total + $pem->nominal;
                    }
                    $kekurangan = $nominal->nominal - $total;
                }else{
                    $nominal = 0;
                    $kekurangan = 0;
                }
        }
        return view('client.pembayaran',compact('akun','nominal','pembayaran','nominal','kekurangan'));
    }

    public function upload_pembayaran($id){
        $akun = User::where('wa_siswa',$id)->first();

        if($akun==null){
            $akun = User::where('wa_user',$id)->first();
            $no_siswa = $akun->wa_siswa;
        }else{
            $no_siswa = $akun->wa_user;
        }
        return view('client.upload-pembayaran',compact('no_siswa'));
    }

    public function bukti(Request $request){
        $user = User::where('wa_user',$request->no_wa)->first();
        $pembayaran = Pembayaran::where('wa_user',$request->no_wa)->count();
        Pembayaran::create([
            'tanggal_pembayaran' => Carbon::now(),
            'nominal' => $request->nominal,
            'pembayaran_ke' => $pembayaran + 1,
            'status' => 2,
            'wa_user' => $request->no_wa,
            'bukti_pembayaran' => $request->file('bukti')->storeAs('public/bukti_pembayaran/' . $user->nama , $request->file('bukti')->getClientOriginalName())
        ]);

        return redirect('pembayaran/'.$request->no_wa);
    }

    public function scan($id){
        $akun = User::where('wa_siswa',$id)->first();
        return view('client.scan',compact('akun'));
    }

    public function validasi_qrcode(Request $request){
        $qr = $request->qr_code;
        $data = qr_code::where('tanggal',Carbon::now()->toDateString())->first();
        if($qr == $data->token){
            return response()->json([
                'status' => 200,
            ]);
        }else{
            return response()->json([
                'status' => 400,
            ]);
        }
    }
}
