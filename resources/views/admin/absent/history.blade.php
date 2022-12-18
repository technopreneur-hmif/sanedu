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
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Pertemuan</th>
                    <th>Masuk</th>
                    <th>Tidak Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Pertemuan</th>
                    <th>Masuk</th>
                    <th>Tidak Masuk</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($students as $i => $student)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->class->nama_kelas }}</td>
                    <td>{{ $student->class->qrCodes->count() }}</td>
                    <td>{{ $student->presentions->count() }}</td>
                    <td>{{ $student->class->qrCodes->count() - $student->presentions->count() }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
@endsection