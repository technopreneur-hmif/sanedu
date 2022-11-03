<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if($request->roles=='1'){
            if($request->tombol=='Login'){
                $role = '1';
                return view('login',compact('role'));
            }else if($request->tombol=='Daftar'){
                return view('daftarortu');
            }

        }else if($request->roles=='2'){
            if($request->tombol=='Login'){
                $role = '2';
                return view('login',compact('role'));
            }else if($request->tombol=='Daftar'){
                return view('daftarsiswa');
            }
        }
        return redirect('');
    }

    public function daftar_ortu(){
        return view('daftarortu');
    }

    public function check_login(Request $request){
        if($request->roles=='1'){
            $data = [
                'wa_ortu' => $request->input('no_wa'),
                'password' => $request->input('password')
            ];
        }else{
            $data = [
                'wa_siswa' => $request->input('no_wa'),
                'password' => $request->input('password')
            ];
        }
        if(Auth::Attempt($data)){
            return redirect('');
        }else{
            return redirect('login');
        }
    }

    public function daftarsiswa(Request $request){
        if($request->password==$request->repassword){
            User::create([
                'nama' => $request->nama,
                'wa_siswa' => $request->no_wa,
                'password' => bcrypt($request->password),
                'roles_id' => 2,
                'status' => 1
            ]);
        }else{
            return redirect('login');
        }
    }

    public function daftarortu(Request $request){
        if($request->password==$request->repassword){
            User::create([
                'nama' => $request->nama,
                'wa_ortu' => $request->wa_ortu,
                'wa_siswa' => $request->wa_siswa,
                'hubungan' => $request->hubungan,
                'password' => bcrypt($request->password),
                'roles_id' => 1,
                'status' => 1
            ]);
        }else{
            return redirect('login');
        }
    }
}
