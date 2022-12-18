<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Cashflow;
use App\Models\Kelas;
use App\Models\Meeting;
use App\Models\Pembayaran;
use Auth;
use Illuminate\Http\Request;

class AdminAbsentController extends Controller
{
    
    public function meeting() {
        $data = Meeting::get();
        return view('admin.absent.meeting')->with([
            'data' => $data
        ]);
    }

    public function meetingForm($id = null) {
        $classOptions = Kelas::get();
        if($id == null) {
            return view('admin.absent.meeting-form')->with([
                'classOptions' => $classOptions
            ]);
        }
        $meeting = Meeting::findOrFail($id);
        return view('admin.absent.meeting-form')->with([
            'classOptions' => $classOptions,
            'meeting' => $meeting,
        ]);
    }

    public function meetingSave(Request $input, $id=null) {
        $meeting = new Meeting;
        if($id != null) {
            $meeting = Meeting::findOrFail($id);
        }
        $meeting->class_id = $input->class_id;
        $meeting->days = $input->days;
        $meeting->hours = $input->hours;
        $meeting->save();
        
        return redirect()->route('admin.absent.meeting');
    }

    public function meetingDelete($id) {
        $data = Meeting::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.absent.meeting')->with([
            'success' => 'Berhasil menghapus data pertemuan'
        ]);
    }

}
