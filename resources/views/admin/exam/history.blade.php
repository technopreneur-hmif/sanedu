@extends('layouts.admin.base')

@section('title')
Rekapan Ujian
@endsection

@section('content')
{{-- <a href="{{ route('admin.exam.form') }}" class="btn btn-md btn-primary btn-space btn-icon"> <i class="mdi mdi-plus"></i> Tambah Rekapan Ujian</a> --}}
<div class="email-inbox-header">
    <div class="row">
        <div class="col-md-10">
            <div class="email-title">
                <span class="icon mdi mdi-accounts-alt mr-3"></span> Rekapan Ujian
            </div>
        </div>
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    @if (isset($selectedExam))
                        {{$selectedExam->exam_name}}
                    @else
                        Pilih Ujian
                    @endif
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach ($exams as $exam)
                        <li><a href="{{route('admin.exam.history', ['examId' => $exam->id])}}">{{$exam->exam_name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default panel-table no-border mb-0">
    <div class="panel-body">
        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Nama Ujian</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Nama Ujian</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($students as $i => $student)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->class->nama_kelas }}</td>
                    <td>{{ $selectedExam->exam_name }}</td>
                    <td><strong>Mata Pelajaran</strong></td>
                    <td><strong>Soal</strong></td>
                    <td><strong>Benar</strong></td>
                    <td><strong>Salah</strong></td>
                    <td><strong>Nilai</strong></td>
                    <td>
                        <a href="{{ route('admin.exam.history.form', ['id' => $student->id, 'examId' => $selectedExam->id]) }}" class="btn btn-xs btn-success">
                            Koreksi
                        </a>
                        {{-- <a href="{{ route('admin.exam.delete', $student->id) }}" class="btn btn-xs btn-danger delete" title="Delete">
                            Delete
                        </a> --}}
                    </td>
                </tr>
                    @foreach ($corrections->where('student_id', $student->id) as $correction)
                    <tr>
                        <td colspan="4"></td>
                        <td>{{$correction->examSubject->subject->name}}</td>
                        <td>{{$correction->question_total}}</td>
                        <td>{{$correction->correct}}</td>
                        <td>{{$correction->incorrect}}</td>
                        <td>{{$correction->score}}</td>
                        <td></td>
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
@endsection