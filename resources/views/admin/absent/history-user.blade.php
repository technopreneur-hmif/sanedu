@extends('layouts.admin.base')

@section('title')
Rekapan Absen
@endsection



@section('content')
<div class="email-inbox-header">
    <div class="row">
        <div class="col-md-12">
            <div class="email-title">
                <span class="icon mdi mdi-accounts-alt mr-3"></span> Rekapan Absen
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
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Waktu Masuk</th>
                    <th>Masuk Kehadiran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Waktu Masuk</th>
                    <th>Masuk Kehadiran</th>
                    <th>Keterangan</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($presensi as $i => $p)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $p->tanggal_presensi }}</td>
                    <td>{{ $p->hari }}</td>
                    <td>{{ $p->waktu_masuk }}</td>
                    <td>{{ $p->waktu_submit }}</td>
                    <td>
                        @foreach($keterangan as $k)
                            @if($p->keterangan == $k->id_keterangan)
                            {{ $k->keterangan }}
                            @endif
                        @endforeach
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