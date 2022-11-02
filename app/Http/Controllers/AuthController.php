<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    }
}
