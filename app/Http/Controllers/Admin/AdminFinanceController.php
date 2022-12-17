<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Cashflow;
use App\Models\Pembayaran;
use Auth;

class AdminFinanceController extends Controller
{
    
    public function payment() {
        $data = Pembayaran::where('status', 2)->get();
        return view('admin.finance.payment')->with([
            'data' => $data
        ]);
    }

    public function paymentDelete($id) {
        $data = Pembayaran::where('id_pembayaran', $id)->first();
        $data->delete();
        return redirect()->route('admin.finance.payment')->with('success', 'Pembayaran berhasil dihapus');
    }

    public function paymentAcc($id) {
        $payment = Pembayaran::where('id_pembayaran', $id)->where('status', 2)->first();
        
        if($payment != null) {
            $payment->status = 1;
            $payment->approved_at = date('Y-m-d H:i:s');
            $payment->save();
    
            // $last_balance = 0;
            $lastCashflow = Cashflow::orderBy('id', 'desc')->first();
    
            $newCashflow = new Cashflow;
            $newCashflow->user_id = Auth::user()->id;
            $newCashflow->nominal = $payment->nominal;
            $newCashflow->last_balance = ($lastCashflow?->last_balance ?? 0) + $payment->nominal;
            $newCashflow->transaction_id = $payment->id_pembayaran;
            $newCashflow->transaction_type = 'cashflow_class_payment';
            $newCashflow->save();
    
            return redirect()->route('admin.finance.payment')->with('success', 'Pembayaran berhasil disetujui');
        }
        
        return redirect()->route('admin.finance.payment')->with('danger', 'Pembayaran sudah disetujui');
    }

    public function history() {
        $data = Cashflow::orderBy('id', 'desc')->get();
        return view('admin.finance.history')->with([
            'data' => $data
        ]);
    }

}
