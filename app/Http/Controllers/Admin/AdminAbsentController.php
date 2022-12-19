<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Cashflow;
use App\Models\Kelas;
use App\Models\Meeting;
use App\Models\Pembayaran;
use App\Models\qr_code;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminAbsentController extends Controller
{
    
    public function meeting() {
        $data = Meeting::get();
        $classes = Kelas::get();
        $selectedClass = null;
        
        if(isset($_GET['classId']) && $_GET['classId'] != '') {
            $selectedClass = Kelas::find($_GET['classId']);
            $data = Meeting::where('class_id', $selectedClass->id)->get();
        }

        return view('admin.absent.meeting')->with([
            'data' => $data,
            'classes' => $classes,
            'selectedClass' => $selectedClass,
        ]);
    }

    public function meetingGenerateQrCode($id) {
        $meeting = Meeting::findOrFail($id);
        $lastQrCode = qr_code::where('kelas', $meeting->class_id)
                                ->where('meeting_id', $id)
                                ->whereDate('tanggal', date('Y-m-d'))
                                ->first();
        if($lastQrCode == null) {
            $qrCode = new qr_code;
            $qrCode->token = md5(bcrypt(date('Y-m-d') . $meeting->started_at . $meeting->started_at . $meeting->id)) . $meeting->id;
            $qrCode->kelas = $meeting->class_id;
            $qrCode->meeting_id = $meeting->id;
            $qrCode->tanggal = date('Y-m-d');
            $qrCode->started_at = $meeting->started_at;
            $qrCode->finished_at = $meeting->finished_at;
            $qrCode->save();

            $meeting->last_qr_code = $qrCode->id;
            $meeting->save();
        }
        return redirect()->route('admin.absent.meeting');
    }

    public function meetingShowQrCode($id) {
        $qrCode = qr_code::where('id', $id)->first();
        return view('admin.absent.meeting-qr-code')->with([
            'qrCode' => $qrCode
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
        $meeting->started_at = $input->started_at;
        $meeting->finished_at = $input->finished_at;
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

    public function absentHistory() {
        $students = User::where('roles_id', 2)->get();
        return view('admin.absent.history')->with([
            'students' => $students
        ]);
    }

}
