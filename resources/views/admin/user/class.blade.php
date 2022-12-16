@extends('layouts.admin.base')

@section('title')
User
@endsection



@section('content')
<div class="email-inbox-header">
    <div class="row">
        <div class="col-md-12">
            <div class="email-title">
                <span class="icon mdi mdi-accounts-alt mr-3"></span> Kelas
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default panel-table no-border mb-0">
    <div class="panel-body">
        @if(false)
        <div class="data-is-empty">
            <p><i class="mdi mdi-close-circle"></i></p>
            <p>BELUM ADA MEMBER</p>
        </div>
        @else
        <table id="datatables" class="table datatables table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($data as $i => $kelas)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $kelas->nama_kelas }}</td>
                    <td>{{ $kelas->jumlah }}</td>
                    <td>
                        <a href="{{ route('kelas_edit', $kelas->id) }}" class="btn btn-xs btn-default" title="Delete">
                            Edit
                        </a>
                        <a href="{{ route('kelas_delete', $kelas->id) }}" class="btn btn-xs btn-danger delete" title="Delete">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection

@section('script')
@endsection