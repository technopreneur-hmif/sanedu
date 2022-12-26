@extends('layouts.admin.base')

@section('title')
Ujian
@endsection

@section('content')
<a href="{{ route('admin.exam.form') }}" class="btn btn-md btn-primary btn-space btn-icon"> <i class="mdi mdi-plus"></i> Tambah Ujian</a>
<div class="email-inbox-header">
    <div class="email-title">
        <span class="icon mdi mdi-accounts-alt mr-3"></span> Ujian
    </div>
</div>

<div class="panel panel-default panel-table no-border mb-0">
    <div class="panel-body">
        <table id="datatables" class="table datatables table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kelas</th>
                    <th>Nama Ujian</th>
                    <th>Terinput</th>
                    <th>Belum Terinput</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kelas</th>
                    <th>Nama Ujian</th>
                    <th>Terinput</th>
                    <th>Belum Terinput</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($exams as $i => $exam)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $exam->date }}</td>
                    <td>{{ $exam->class->nama_kelas }}</td>
                    <td>{{ $exam->exam_name }}</td>
                    <td>1</td>
                    <td>1</td>
                    <td>
                        <a href="{{ route('admin.exam.form', $exam->id) }}" class="btn btn-xs btn-success">
                            Edit
                        </a>
                        {{-- <a href="{{ route('admin.exam.delete', $exam->id) }}" class="btn btn-xs btn-danger delete" title="Delete">
                            Delete
                        </a> --}}
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