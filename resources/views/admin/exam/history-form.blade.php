@extends('layouts.admin.base')

@section('title')
Form Koreksi
@endsection

@section('content')
@if(isset($correction))
<form class="row" action="{{ route('admin.exam.history.save', $correction->id) }}" method="post">
@else
<form class="row" action="{{ route('admin.exam.history.save') }}" method="post">
@endif
    <div class="col-md-6">
        <div class="panel panel-default">
            {{ csrf_field() }}
            <input type="hidden" name="exam_id" value="{{$examId}}">
            <input type="hidden" name="user_id" value="{{$userId}}">
            <div class="panel-body">
                @foreach ($subjects as $subject)
                <input type="hidden" name="exam_subject_id[]" value="{{$subject->id}}">
                <div class="mb-3">
                    <h4 class="text-bold">{{$subject->subject->name}}</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jumlah Soal</label>
                                <input type="number" class="form-control input-sm" name="question_total[]"  value="{{ isset($exam) ? $exam->question_total : old('question_total') }}" required>
                                @if($errors->has('question_total'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('question_total') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Benar</label>
                                <input type="number" class="form-control input-sm" name="correct[]"  value="{{ isset($exam) ? $exam->correct : old('correct') }}" required>
                                @if($errors->has('correct'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('correct') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Salah</label>
                                <input type="number" class="form-control input-sm" name="incorrect[]"  value="{{ isset($exam) ? $exam->incorrect : old('incorrect') }}" required>
                                @if($errors->has('incorrect'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('incorrect') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="number" class="form-control input-sm" name="score[]"  value="{{ isset($exam) ? $exam->score : old('score') }}" required>
                                @if($errors->has('score'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('score') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <button type="submit"  class="btn btn-primary btn-fill btn-md btn-icon"><i class="mdi mdi-check"></i>Simpan</button>
            </div>
        </div>
    </div>
</form> <!-- end row -->
@endsection
