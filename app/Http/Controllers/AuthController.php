<?php

namespace App\Http\Controllers;

use App\Models\Nominal;
use App\Models\Pembayaran;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if($request->roles=='1'){
            if($request->tombol=='Login'){
                $role = '1';
                return view('login',compact('role'));
            }else if($request->tombol=='Daftar'){
                $pesan='0';
                return view('daftarortu',compact('pesan'));
            }

        }else if($request->roles=='2'){
            if($request->tombol=='Login'){
                $role = '2';
                return view('login',compact('role'));
            }else if($request->tombol=='Daftar'){
                $pesan='0';
                return view('daftarsiswa',compact('pesan'));
            }
        }
        return redirect('');
    }

    public function loginadmin(){
        return view('loginadmin');
    }



    public function daftar_ortu(){
        return view('daftarortu');
    }

    public function check_loginadmin(Request $request){
        $data = [
            'wa_user' => $request->input('no_wa'),
            'password' => $request->input('password')
        ];
        if(Auth::Attempt($data)){
            return redirect('verifikasi');
        }else{
            return redirect('loginadmin');
        }
    }

    public function check_login(Request $request){
        $verif = User::where('wa_user',$request->no_wa)->first();
        if($request->roles=='1' && $verif->status=='1'){
            if($verif)
                $data = [
                    'wa_user' => $request->input('no_wa'),
                    'password' => $request->input('password')
                ];
        }else if($request->roles=='2' && $verif->status=='1'){
            $data = [
                'wa_user' => $request->input('no_wa'),
                'password' => $request->input('password')
            ];
        }else{
            return redirect('');
        }
        if(Auth::Attempt($data)){

            dd($request->all());
        }else{
            return redirect('');
        }
    }

    public function clientside(Request $request){
        if($request->roles=='1'){
            $verif = User::where('wa_user',$request->no_wa)->where('roles_id','1')->first();
            if($verif==true && $request->roles=='1'){
                if($verif->status!='1'){
                    return redirect('loginortu')->with('akun','Akun anda belum diverifikasi, harap hubungi admin');
                }
                if(!Hash::check($request->password,$verif->password)){
                    return redirect('loginortu')->with('password','Password salah, jika lupa hubungi admin');
                }
                else{
                    $data = [
                        'wa_user' => $request->input('no_wa'),
                        'password' => $request->input('password')
                    ];
                }
            }else{
                return redirect('loginortu')->with('nomor','Nomor tidak sesuai');
            }
        }else if($request->roles=='2'){
            $verif = User::where('wa_user',$request->no_wa)->where('roles_id','2')->first();
            if($verif==true && $request->roles=='2'){
                if($verif->status!='1'){
                    return redirect('loginsiswa')->with('akun','Akun anda belum diverifikasi, harap hubungi admin');
                }
                if(!Hash::check($request->password,$verif->password)){
                    return redirect('loginsiswa')->with('password','Password salah, jika lupa hubungi admin');
                }
                else{
                    $data = [
                        'wa_user' => $request->input('no_wa'),
                        'password' => $request->input('password')
                    ];
                }
            }else{
                return redirect('loginsiswa')->with('nomor','Nomor tidak sesuai');
            }
        }else{
            return redirect('');
        }
        if(Auth::Attempt($data)){
            return redirect('absensi');
        }else{
            return redirect('');
        }
    }

    public function daftarsiswa(Request $request){
        $verif = User::where('wa_user',$request->no_wa)->first();
        if($request->password==$request->repassword && $verif==false){
            User::create([
                'nama' => $request->nama,
                'wa_user' => $request->no_wa,
                'password' => Hash::make($request->password),
                'roles_id' => 2,
                'status' => 2
            ]);
            return redirect('');
        }else if($verif==true){
            return redirect('pendaftaransiswa')->with('nomor','Nomor sudah terdaftar');
        }else if($request->password!=$request->repassword){
            return redirect('pendaftaransiswa')->with('password','Password tidak sama harap ulangi');
        }
    }

    public function daftarortu(Request $request){
        $verif = User::where('wa_user',$request->wa_ortu)->first();
        $akun = User::where('wa_user',$request->wa_siswa)->first();
        if($akun==false){
            return redirect('pendaftaranortu')->with('akun','Akun Siswa belum terdaftar');
        }
        else if($request->password==$request->repassword && $verif==false){
            User::create([
                'nama' => $request->nama,
                'wa_user' => $request->wa_ortu,
                'wa_siswa' => $request->wa_siswa,
                'hubungan' => $request->hubungan,
                'password' => Hash::make($request->password),
                'roles_id' => 1,
                'status' => 2
            ]);
            return redirect('');
        }else if($verif==true){
            return redirect('pendaftaranortu')->with('nomor','Nomor sudah terdaftar');
        }else if($request->password!=$request->repassword){
            return redirect('pendaftaranortu')->with('password','Password tidak sama harap ulangi');
        }
    }
}
