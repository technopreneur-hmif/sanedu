<?php

namespace App\Http\Controllers;

use App\Models\Keterangan;
use App\Models\Nominal;
use App\Models\Pembayaran;
use App\Models\Presensi;
use App\Models\qr_code;
use App\Models\Status;
use App\Models\Ujian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ClientController extends Controller
{
    public function absensi(){
        if(Auth::check()){
            $keterangan = Keterangan::all();
            if(Auth::user()->roles_id=='2'){
                $client = User::where('wa_user',Auth::user()->wa_user)->where('roles_id','2')->first();
                $siswa = User::where('wa_siswa',null)->get();
                $presensi = Presensi::where('wa_user',Auth::user()->wa_user)->orderBy('created_at','DESC')->get();
                $nominal = Nominal::where('wa_user',Auth::user()->wa_user)->first();
                $pembayaran = Pembayaran::where('wa_user',Auth::user()->wa_user)->where('status','1')->get();
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
                return view('client.absensi',compact('client','siswa','total','presensi','nominal','pembayaran','kekurangan','keterangan'));
            }else{
                $client = User::where('wa_user',Auth::user()->wa_user)->where('roles_id','1')->first();
                $siswa = User::where('wa_user',$client->wa_siswa)->first();
                $presensi = Presensi::where('wa_user',$siswa->wa_user)->orderBy('created_at','DESC')->get();
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
                return view('client.absensi',compact('client','siswa','total','presensi','nominal','pembayaran','kekurangan','keterangan'));
            }
        }else{
            return redirect('');
        }
    }

    public function riwayat_pembayaran(){
        if(Auth::check()){
            $status = Status::all();
            if(Auth::user()->roles_id=='2'){
                $client = User::where('wa_user',Auth::user()->wa_user)->where('roles_id','2')->first();
                $siswa = User::where('wa_siswa',null)->get();
                $bayar = Pembayaran::where('wa_user',Auth::user()->wa_user)->orderBy('created_at','DESC')->get();
                $nominal = Nominal::where('wa_user',Auth::user()->wa_user)->first();
                $pembayaran = Pembayaran::where('wa_user',Auth::user()->wa_user)->where('status','1')->get();
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
                return view('client.riwayat-pembayaran',compact('client','siswa','total','bayar','pembayaran','nominal','kekurangan','status'));
            }else{
                $client = User::where('wa_user',Auth::user()->wa_user)->where('roles_id','1')->first();
                $siswa = User::where('wa_user',$client->wa_siswa)->first();
                $ortu = User::where('wa_siswa',$client->wa_user)->first();
                $bayar = Pembayaran::where('wa_user',$client->wa_siswa)->orderBy('created_at','DESC')->get();
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
                return view('client.riwayat-pembayaran',compact('client','siswa','bayar','total','pembayaran','nominal','kekurangan','status'));
            }
        }else{
            return redirect('');
        }
    }

    public function riwayat_ujian(){
        if(Auth::check()){
            if(Auth::user()->roles_id=='2'){
                $client = User::where('wa_user',Auth::user()->wa_user)->where('roles_id','2')->first();
                $siswa = User::where('wa_siswa',null)->get();
                $ujian = Ujian::where('wa_user',Auth::user()->wa_user)->orderBy('created_at','DESC')->get();;
                $nominal = Nominal::where('wa_user',Auth::user()->wa_user)->first();
                $pembayaran = Pembayaran::where('wa_user',Auth::user()->wa_user)->where('status','1')->get();
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
                return view('client.riwayat-ujian',compact('client','siswa','total','ujian','nominal','pembayaran','kekurangan'));
            }else{
                $client = User::where('wa_user',Auth::user()->wa_user)->where('roles_id','1')->first();
                $siswa = User::where('wa_user',$client->wa_siswa)->first();
                $ortu = User::where('wa_siswa',$client->wa_user)->first();
                $ujian = Ujian::where('wa_user',$client->wa_siswa)->orderBy('created_at','DESC')->get();
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
                return view('client.riwayat-ujian',compact('client','siswa','total','ujian','nominal','pembayaran','kekurangan'));
            }
        }else{
            return redirect('');
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

        $file = $request->file('bukti');
        $tujuan_upload = 'public/bukti_pembayaran/'.$user->nama;
        $file->move($tujuan_upload,$file->getClientOriginalName());

        return redirect('riwayat_pembayaran');
    }

    public function scan($id){
        if(Auth::check()){
            $akun = User::where('wa_user',$id)->first();
            return view('client.scan',compact('akun'));
        }else{
            return redirect('');
        }
    }

    public function validasi_qrcode(Request $request){
        $qr = $request->qr_code;
        $data = qr_code::where('tanggal',Carbon::now()->toDateString())->first();
        $kelas = qr_code::where('kelas',Auth::user()->kelas)->first();
        if($data == false){
            Presensi::create([
                'tanggal_presensi' => Carbon::now()->toDateString(),
                'hari' => Carbon::now()->isoFormat('dddd'),
                'waktu_masuk' => Carbon::now()->toTimeString(),
                'waktu_submit' => Carbon::now()->toTimeString(),
                'keterangan' => 2,
                'wa_user' => $request->wa_user
            ]);
            return response()->json([
                'status' => 400,
            ]);
        }
        elseif($qr == $data->token && $kelas == true){
            Presensi::create([
                'tanggal_presensi' => Carbon::now()->toDateString(),
                'hari' => Carbon::now()->format('l'),
                'waktu_masuk' => $data->created_at,
                'waktu_submit' => Carbon::now()->toTimeString(),
                'keterangan' => 1,
                'wa_user' => $request->wa_user
            ]);
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
