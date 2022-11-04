<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenController extends Controller
{
    public function check_login(Request $request)
    {
        if($request->roles=='1'){

        }else if($request->roles=='2'){

        }
        return redirect('');
    }

    public function loginortu(){
        $role = '1';
        return view('loginnew',compact('role'));
    }

    public function loginsiswa(){
        $role = '2';
        return view('loginnew',compact('role'));
    }

    public function pendaftaranortu(){
        return view('daftarortu');
    }

    public function pendaftaransiswa(){
        return view('daftarsiswa');
    }
}
