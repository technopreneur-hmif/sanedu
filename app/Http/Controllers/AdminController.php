<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Nominal;
use Exception;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function verifikasi(){
        $data = User::where('status','2')->get();
        $siswa = User::where('wa_siswa',null)->get();
        return view('cms.verifikasi',compact('data','siswa'));
    }

    public function verifikasi_edit($id){
        $verif = User::where('id',$id)->first();
        $kelas = Kelas::all();
        return view('cms.acc-verif', compact('verif','kelas'));
    }

    public function verifikasi_update(Request $request){
        if($request!=null){
            Nominal::create([
                'nominal' => $request->nominal,
                'wa_user' => $request->wa_user
            ]);
            $nominal = Nominal::findOrFail($request->wa_user);
            $upd = User::findOrFail($request->id);
            $upd->update([
                'status' => '1',
                'nominal' => $nominal->id
            ]);
            $siswa = User::findOrFail($request->wa_siswa);
            $siswa->update([
                'nominal' => $nominal->id
            ]);
            return redirect('verifikasi')->with('sukses', 'Berhasil Update Data!');
        }else{
            return redirect('verifikasi')->with('error', 'Gagal Update Data!');
        }

    }

    public function destroy($id){
        try{

            $data = User::where('id', $id)->first();
            $data->delete();
        } catch(Exception $ex){
            return redirect('verifikasi')->with('error', 'Gagal Hapus Data!');
        }
        return redirect('verifikasi')->with('sukses', 'Berhasil Hapus Data!');
    }
}
