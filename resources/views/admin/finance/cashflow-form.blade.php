@extends('layouts.admin.base')

@section('title')
Pengeluaran/Pemasukan
@endsection

@section('content')
<form class="row" action="{{ route('admin.finance.cashflow.save') }}" method="post">
    <div class="col-md-6">
        <div class="panel panel-default">
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="form-group">
                    <label>Pilih Transaksi</label>
                    <select class="form-control input-sm" name="transaction_type" required>
                        <option value="">Pilih Jenis Transaksi</option>
                        <option value="cashflow_income">Pemasukan</option>
                        <option value="cashflow_outcome">Pengeluaran</option>
                    </select>
                    @if($errors->has('transaction_type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('transaction_type') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Nominal</label>
                    <input type="number" class="form-control input-sm" name="nominal" required>
                    @if($errors->has('nominal'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nominal') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control input-sm" name="description" required>
                    @if($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>
                <button type="submit"  class="btn btn-primary btn-fill btn-md btn-icon"><i class="mdi mdi-check"></i>Simpan</button>
            </div>
        </div>
    </div>
</form> <!-- end row -->
@endsection
