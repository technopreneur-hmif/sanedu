@extends('layouts.admin.base')

@section('title')
Pembayaran
@endsection



@section('content')
<div class="email-inbox-header">
    <div class="row">
        <div class="col-md-12">
            <div class="email-title">
                <span class="icon mdi mdi-accounts-alt mr-3"></span> Pembayaran
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default panel-table no-border mb-0">
    <div class="panel-body">
        <table id="datatables" class="table datatables table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Transaksi</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th>Saldo Terakhir</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Jenis Transaksi</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th>Saldo Terakhir</th>
                    <th>Waktu</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($data as $i => $cashflow)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $cashflow->transaction_type }}</td>
                    <td>{{ $cashflow->nominal < 0 ? 'Rp ' . number_format($cashflow->nominal) : '-'}}</td>
                    <td>{{ $cashflow->nominal >= 0 ? 'Rp ' . number_format($cashflow->nominal) : '-'}}</td>
                    <td>{{ 'Rp' . number_format($cashflow->last_balance)}}</td>
                    <td>{{ $cashflow->created_at}}</td>
                    {{-- <td>
                        <a href="{{ asset($payment->bukti_pembayaran) }}" class="btn btn-xs btn-default" title="Delete">
                            Lihat Bukti
                        </a>
                        <a href="{{ route('admin.finance.payment.acc', $payment->id_pembayaran) }}" class="btn btn-xs btn-success" title="Delete">
                            ACC
                        </a>
                        <a href="{{ route('admin.finance.payment.delete', $payment->id_pembayaran) }}" class="btn btn-xs btn-danger delete" title="Delete">
                            Delete
                        </a>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
@endsection