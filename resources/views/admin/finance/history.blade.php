@extends('layouts.admin.base')

@section('title')
Pembayaran
@endsection



@section('content')
<a href="{{ route('admin.finance.cashflow.form') }}" class="btn btn-md btn-primary btn-space btn-icon"> <i class="mdi mdi-plus"></i> Tambah Pemasukan/Pengeluaran</a>

<div class="panel panel-default p-5">
    <div class="row">
        <div class="col-md-2">
            <div>SALDO</div>
            <strong>Rp 5.000.000</strong>
        </div>
        <div class="col-md-2">
            <div>PROYEKSI</div>
            <strong>Rp 10.000.000</strong>
        </div>
        <div class="col-md-2">
            <div>PEMASUKAN</div>
            <strong>Rp 10.000.000</strong>
        </div>
        <div class="col-md-2">
            <div>KEKURANGAN</div>
            <strong>Rp 10.000.000</strong>
        </div>
        <div class="col-md-2">
            <div>PENGELUARAN</div>
            <strong>Rp 10.000.000</strong>
        </div>
    </div>
</div>

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
                    <th>Kredit</th>
                    <th>Debit</th>
                    <th>Saldo Terakhir</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Jenis Transaksi</th>
                    <th>Kredit</th>
                    <th>Debit</th>
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