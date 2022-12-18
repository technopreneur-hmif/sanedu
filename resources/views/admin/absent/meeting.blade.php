@extends('layouts.admin.base')

@section('title')
Pertemuan
@endsection



@section('content')
<a href="{{ route('admin.absent.meeting.form') }}" class="btn btn-md btn-primary btn-space btn-icon"> <i class="mdi mdi-plus"></i> Tambah Pertemuan</a>

<div class="email-inbox-header">
    <div class="row">
        <div class="col-md-12">
            <div class="email-title">
                <span class="icon mdi mdi-accounts-alt mr-3"></span> Pertemuan
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
                    <td>{{ $meeting->hours }}</td>
                    <td>
                        <a href="{{ asset($meeting->id) }}" class="btn btn-xs btn-default" title="Delete">
                            Generate Barcode
                        </a>
                        <a href="{{ route('admin.absent.meeting.form', $meeting->id) }}" class="btn btn-xs btn-success" title="Delete">
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