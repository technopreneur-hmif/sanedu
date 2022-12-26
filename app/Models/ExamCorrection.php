<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamCorrection extends Model
{
    use HasFactory;

    public function student() {
      return $this->belongsTo(User::class, 'student_id')->withDefault();
    }

    public function class() {
      return $this->belongsTo(Kelas::class, 'class_id')->withDefault();
    }
    
    public function exam() {
      return $this->belongsTo(Kelas::class, 'exam_id')->withDefault();
    }

    public function examSubject() {
      return $this->belongsTo(ExamSubject::class, 'exam_subject_id')->withDefault();
    }
}
