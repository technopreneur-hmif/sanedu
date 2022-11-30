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
        return view('cms.user.verifikasi',compact('data','siswa'));
    }

    public function verifikasi_edit($id){
        $verif = User::where('id',$id)->first();
        $kelas = Kelas::all();
        return view('cms.user.acc-verif', compact('verif','kelas'));
    }

    public function verifikasi_update(Request $request){
            Nominal::create([
                'nominal' => $request->nominal,
                'wa_user' => $request->wa_user
            ]);
            $nominal = Nominal::where('wa_user',$request->wa_user)->first();
            $upd = User::where('id',$request->id)->first();
            $upd->update([
                'status' => '1',
                'nominal' => $nominal->id
            ]);
            $siswa = User::where('wa_user',$request->wa_siswa)->first();
            $siswa->update([
                'nominal' => $nominal->id
            ]);
            return redirect('verifikasi')->with('sukses', 'Berhasil Acc Data!');

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

    public function siswa(){
        $data = User::where('roles_id','2')->where('status','1')->get();
        $kelas = Kelas::all();
        return view('cms.user.siswa',compact('data','kelas'));
    }

    public function siswa_edit($id){
        $edit = User::where('id',$id)->first();
        $kelas = Kelas::all();
        return view('cms.user.siswa_edit',compact('edit','kelas'));
    }

    public function verif_siswa(Request $request){
        $update = User::where('wa_user',$request->wa_user)->first();
        if($request->password != null){
        $update->update([
                'password' =>Hash::make($request->password),
                'kelas' => $request->kelas
        ]);
        }else{
            $update->update([
                'kelas' =>$request->kelas
        ]);
        }
        return redirect('siswa');
    }

    public function siswa_delete($id){
        try{

            $data = User::where('id', $id)->first();
            $data->delete();
        } catch(Exception $ex){
            return redirect('siswa')->with('error', 'Gagal Hapus Data!');
        }
        return redirect('siswa')->with('sukses', 'Berhasil Hapus Data!');
    }

    public function ortu(){
        $data = User::where('roles_id','1')->where('status','1')->get();
        $siswa = User::where('wa_siswa',null)->get();
        return view('cms.user.ortu',compact('data','siswa'));
    }

    public function ortu_edit($id){
        $edit = User::where('id',$id)->first();
        return view('cms.user.ortu_edit',compact('edit'));
    }

    public function verif_ortu(Request $request){
        $update = User::where('wa_user',$request->wa_user)->first();
        if($request->password != null){
        $update->update([
                'password' =>Hash::make($request->password),
        ]);
        }
        return redirect('ortu');
    }

    public function ortu_delete($id){
        try{

            $data = User::where('id', $id)->first();
            $data->delete();
        } catch(Exception $ex){
            return redirect('ortu')->with('error', 'Gagal Hapus Data!');
        }
        return redirect('ortu')->with('sukses', 'Berhasil Hapus Data!');
    }

    public function kelas(){
        $data = Kelas::all();
        return view('cms.user.kelas',compact('data'));
    }

    public function kelas_edit($id){
        $edit = Kelas::where('id',$id)->first();
        return view('cms.user.kelas_edit',compact('edit'));
    }

    public function verif_kelas(Request $request){
        $update = Kelas::where('id',$request->id)->first();
        $update->update([
                'nama_kelas' =>$request->nama_kelas,
        ]);
        return redirect('kelas');
    }

    public function kelas_delete($id){
        try{

            $data = User::where('id', $id)->first();
            $data->delete();
        } catch(Exception $ex){
            return redirect('kelas')->with('error', 'Gagal Hapus Data!');
        }
        return redirect('kelas')->with('sukses', 'Berhasil Hapus Data!');
    }

    public function tambahkelas(){
        return view('cms.user.tambah_kelas');
    }
}
