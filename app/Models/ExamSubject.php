<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSubject extends Model
{
    use HasFactory;

    public function class() {
      return $this->belongsTo(Kelas::class, 'class_id')->withDefault();
    }
    public function exam() {
      return $this->belongsTo(Kelas::class, 'exam_id')->withDefault();
    }

    public function subject() {
      return $this->belongsTo(Subject::class, 'subject_id')->withDefault();
    }
}
