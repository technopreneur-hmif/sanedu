@extends('layouts.admin.base')

@section('title')
Form Pertemuan
@endsection

@section('content')
@if(isset($meeting))
<form class="row" action="{{ route('admin.absent.meeting.save', $meeting->id) }}" method="post">
@else
<form class="row" action="{{ route('admin.absent.meeting.save') }}" method="post">
@endif
    <div class="col-md-6">
        <div class="panel panel-default">
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="form-group">
                    <label>Pilih Kelas</label>
                    <select class="form-control input-sm" name="class_id" required>
                        <option value="">Pilih Kelas</option>
                        @foreach($classOptions as $data)
                        @if(isset($meeting))
                        <option value="{{ $data->id }}" {{ $meeting->class_id == $data->id ? "selected" : "" }}>{{ $data->nama_kelas }}</option>
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
                    <label>Hari</label>
                    <input type="text" class="form-control input-sm" placeholder="Senin/Selasa/Rabu/Kamis/Jumat" name="days"  value="{{ isset($meeting) ? $meeting->days : old('days') }}" required>
                    @if($errors->has('days'))
                    <span class="help-block">
                        <strong>{{ $errors->first('days') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jam Mulai</label>
                            <input type="text" class="form-control input-sm" placeholder="12:00" name="started_at"  value="{{ isset($meeting) ? $meeting->started_at : old('started_at') }}" required>
                            @if($errors->has('started_at'))
                            <span class="help-block">
                                <strong>{{ $errors->first('started_at') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jam Selesai</label>
                            <input type="text" class="form-control input-sm" placeholder="14:00" name="finished_at"  value="{{ isset($meeting) ? $meeting->finished_at : old('finished_at') }}" required>
                            @if($errors->has('finished_at'))
                            <span class="help-block">
                                <strong>{{ $errors->first('finished_at') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit"  class="btn btn-primary btn-fill btn-md btn-icon"><i class="mdi mdi-check"></i>Simpan</button>
            </div>
        </div>
    </div>
</form> <!-- end row -->
@endsection
