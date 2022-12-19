<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Cashflow;
use App\Models\Nominal;
use App\Models\Pembayaran;
use Auth;
use Illuminate\Http\Request;

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
        $year = date('Y');
        $nextYear = $year + 1;

        $startDate = date('Y-m-d', strtotime($year . "-07-01"));
        $finishDate = date('Y-m-d', strtotime($nextYear . "-06-30"));
        
        if(isset($_GET['start_date']) && $_GET['start_date'] != '') {
            $startDate = date('Y-m-d', strtotime($_GET['start_date']));
        }
        if(isset($_GET['finish_date']) && $_GET['finish_date'] != '') {
            $finishDate = date('Y-m-d', strtotime($_GET['finish_date']));
        }

        $data = Cashflow::whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $finishDate)
                        ->orderBy('id', 'desc')->get();
        
        $debit = Cashflow::whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $finishDate)
                        ->where('nominal', '>=', 0)
                        ->orderBy('id', 'desc')->get();
        
        $credit = Cashflow::whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $finishDate)
                        ->where('nominal', '<', 0)
                        ->orderBy('id', 'desc')->get();
        
        $projection = Nominal::whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $finishDate)
                        ->orderBy('id', 'desc')->get();
        
        $payment = Pembayaran::whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $finishDate)
                        ->get();

        return view('admin.finance.history')->with([
            'data' => $data,
            'startDate' => $startDate,
            'finishDate' => $finishDate,
            'debit' => $debit,
            'credit' => $credit,
            'projection' => $projection,
            'payment' => $payment,
        ]);
    }

    public function cashflowForm($id = null) {
        return view('admin.finance.cashflow-form');
    }

    public function cashflowSave(Request $input, $id = null) {
        $lastCashflow = Cashflow::orderBy('id', 'desc')->first();

        $nominal = $input->transaction_type == 'cashflow_income' ? $input->nominal : -($input->nominal);

        $cashflow = new Cashflow;
        $cashflow->nominal = $nominal;
        $cashflow->last_balance = ($lastCashflow?->last_balance ?? 0) + $nominal;
        $cashflow->transaction_type = $input->transaction_type;
        $cashflow->description = $input->description;
        $cashflow->save();

        return redirect()->route('admin.finance.history');
    }

}
