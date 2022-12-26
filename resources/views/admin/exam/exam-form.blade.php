@extends('layouts.admin.base')

@section('title')
Form Pertemuan
@endsection

@section('content')
@if(isset($exam))
<form class="row" action="{{ route('admin.exam.save', $exam->id) }}" method="post">
@else
<form class="row" action="{{ route('admin.exam.save') }}" method="post">
@endif
    <div class="col-md-6">
        <div class="panel panel-default">
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="form-group">
                    <label>Nama Ujian</label>
                    <input type="text" class="form-control input-sm" name="exam_name"  value="{{ isset($exam) ? $exam->exam_name : old('exam_name') }}" required>
                    @if($errors->has('exam_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('exam_name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Pilih Kelas</label>
                    <select class="form-control input-sm" name="class_id" required>
                        <option value="">Pilih Kelas</option>
                        @foreach($classOptions as $data)
                        @if(isset($exam))
                        <option value="{{ $data->id }}" {{ $exam->class_id == $data->id ? "selected" : "" }}>{{ $data->nama_kelas }}</option>
                        @else
                        <option value="{{ $data->id }}" {{ old('class_id') == $data->id ? "selected" : "" }}>{{ $data->nama_kelas }}</option>
                        @endif
                        @endforeach
                    </select>
                    @if($errors->has('class_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('class_id') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Pilih Mata Pelajaran</label>
                    <select class="form-control input-sm" name="subjects[]" required multiple>
                        <option value="">Pilih Kelas</option>
                        @foreach($subjects as $data)
                        @if(isset($exam))
                        <?php
                            echo $data->id;
                            echo $exam->subjects;
                            $find = $exam->subjects->where('subject_id', $data->id)->first();
                            echo $find;
                            $selected = $find != null;
                        ?>
                        <option value="{{ $data->id }}" {{ $selected ? "selected" : "" }}>{{ $data->name }}</option>
                        @else
                        <option value="{{ $data->id }}" {{ old('subjects') == $data->id ? "selected" : "" }}>{{ $data->name }}</option>
                        @endif
                        @endforeach
                    </select>
                    @if($errors->has('subjects'))
                    <span class="help-block">
                        <strong>{{ $errors->first('subjects') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Tanggal Ujian</label>
                    <input type="date" class="form-control input-sm" name="date"  value="{{ isset($exam) ? $exam->date : old('date') }}" required>
                    @if($errors->has('date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                    @endif
                </div>
                <button type="submit"  class="btn btn-primary btn-fill btn-md btn-icon"><i class="mdi mdi-check"></i>Simpan</button>
            </div>
        </div>
    </div>
</form> <!-- end row -->
@endsection
