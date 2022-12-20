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
                    <th>Waktu Kehadiran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Kehadiran</th>
                    <th>Keterangan</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($meetings as $i => $meeting)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $meeting->tanggal }}</td>
                    <td>{{ date('l', strtotime($meeting->tanggal)) }}</td>
                    <td>{{ $meeting->started_at }}</td>
                    <td>
                        @if($meeting->presensis->count() > 0) 
                            {{ $meeting->presensis->where('wa_user', $siswa->wa_user)->first()->waktu_submit }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($meeting->presensis->count() > 0) 
                            {{ $meeting->presensis->where('wa_user', $siswa->wa_user)->first()->keterangan }}
                        @else
                            Tidak Hadir
                        @endif
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