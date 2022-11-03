<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenController extends Controller
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

    public function loginortu(){
        $role = '1';
        return view('login',compact('role'));
    }

    public function loginsiswa(){
        $role = '2';
        return view('login',compact('role'));
    }

    public function pendaftaranortu(){
        return view('daftarortu');
    }

    public function pendaftaransiswa(){
        return view('daftarsiswa');
    }
}
