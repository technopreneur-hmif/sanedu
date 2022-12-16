<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Nominal;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    
    public function index(){
        $unverifiedUsers = User::where('status','2')->get();
        $siswa = User::where('wa_siswa',null)->get();
        return view('admin.user.verification')->with([
            'unverifiedUsers' => $unverifiedUsers,
            'siswa' => $siswa,
        ]);
    }

    public function verifikasiEdit($id){
        $verif = User::where('id',$id)->first();
        $kelas = Kelas::all();

        if($verif->roles_id=='1'){
            $nominal = Nominal::where('wa_user',$verif->wa_siswa)->first();
            $verif->update([
                'status' => '1',
                'nominal' => $nominal->id
            ]);
            $data = User::where('status','2')->get();
            $siswa = User::where('wa_siswa',null)->get();
            return view('cms.user.verifikasi',compact('data','siswa'));
        }
        else{
            return view('cms.user.acc-verif', compact('verif','kelas'));
        }
    }

    public function verifikasiUpdate(Request $request){
        $nominal = Nominal::where('wa_user',$request->wa_user)->first();
        if($nominal==null){
            Nominal::create([
                'nominal' => $request->nominal,
                'wa_user' => $request->wa_user
            ]);
        }
        $nominal = Nominal::where('wa_user',$request->wa_user)->first();
        $upd = User::where('id',$request->id)->first();
        if($request->roles==1){
            $upd->update([
                'status' => '1',
                'nominal' => $nominal->id
            ]);
        }else{
            $upd->update([
                'status' => '1',
                'nominal' => $nominal->id,
                'kelas' => $request->kelas
            ]);
        }
        return redirect('admin.user.verification')->with('sukses', 'Berhasil Acc Data!');

    }
    
    public function student(){
        $data = User::where('roles_id','2')->where('status','1')->get();
        return view('admin.user.student')->with([
            'data' => $data,
        ]);
    }

    public function parent(){
        $data = User::where('roles_id','1')->where('status','1')->get();
        return view('admin.user.parent')->with([
            'data' => $data,
        ]);
    }

    public function classList(){
        $data = Kelas::all();
        return view('admin.user.class')->with([
            'data' => $data,
        ]);
    }

}
