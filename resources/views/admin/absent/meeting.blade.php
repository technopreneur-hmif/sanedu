@extends('layouts.admin.base')

@section('title')
Pertemuan
@endsection



@section('content')
<a href="{{ route('admin.absent.meeting.form') }}" class="btn btn-md btn-primary btn-space btn-icon"> <i class="mdi mdi-plus"></i> Tambah Pertemuan</a>
<div class="email-inbox-header">
    <div class="row">
        <div class="col-md-10">
            <div class="email-title">
                <span class="icon mdi mdi-accounts-alt mr-3"></span> Pertemuan
            </div>
        </div>
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    @if (isset($selectedClass))
                        {{$selectedClass->nama_kelas}}
                    @else
                        Pilih Kelas
                    @endif
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="{{route('admin.absent.meeting')}}">Semua Kelas</a></li>
                    @foreach ($classes as $class)
                        <li><a href="{{route('admin.absent.meeting', ['classId' => $class->id])}}">{{$class->nama_kelas}}</a></li>
                    @endforeach
                </ul>
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
                    <th>Kelas</th>
                    <th>Hari</th>
                    <th>Sesi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Hari</th>
                    <th>Sesi</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($data as $i => $meeting)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $meeting->class->nama_kelas }}</td>
                    <td>{{ $meeting->days }}</td>
                    <td>{{ $meeting->started_at }} - {{ $meeting->finished_at }}</td>
                    <td>
                        @if ($meeting->qrCode->tanggal == date('Y-m-d'))
                        <a href="{{ route('admin.absent.meeting.show.qrcode', $meeting->last_qr_code) }}" class="btn btn-xs btn-default">
                            Lihat QR Code
                        </a>
                        @else
                        <a href="{{ route('admin.absent.meeting.generate.qrcode', $meeting->id) }}" class="btn btn-xs btn-default">
                            Generate QR Code
                        </a>
                        @endif
                        <a href="{{ route('admin.absent.meeting.form', $meeting->id) }}" class="btn btn-xs btn-success">
                            Edit
                        </a>
                        <a href="{{ route('admin.absent.meeting.delete', $meeting->id) }}" class="btn btn-xs btn-danger delete" title="Delete">
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