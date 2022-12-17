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
                    <th>Nama Siswa</th>
                    <th>No Whatsapp</th>
                    <th>Pembayaran Ke</th>
                    <th>Nominal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>No Whatsapp</th>
                    <th>Pembayaran Ke</th>
                    <th>Nominal</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($data as $i => $payment)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $payment->student->nama }}</td>
                    <td>{{ $payment->student->wa_user }}</td>
                    <td>{{ $payment->pembayaran_ke }}</td>
                    <td>Rp {{ number_format($payment->nominal) }}</td>
                    <td>
                        <a href="{{ asset($payment->bukti_pembayaran) }}" class="btn btn-xs btn-default" title="Delete">
                            Lihat Bukti
                        </a>
                        <a href="{{ route('admin.finance.payment.acc', $payment->id_pembayaran) }}" class="btn btn-xs btn-success" title="Delete">
                            ACC
                        </a>
                        <a href="{{ route('admin.finance.payment.delete', $payment->id_pembayaran) }}" class="btn btn-xs btn-danger delete" title="Delete">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
@endsection