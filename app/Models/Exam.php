<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function class() {
      return $this->belongsTo(Kelas::class, 'class_id')->withDefault();
    }

    public function subjects() {
      return $this->hasMany(ExamSubject::class, 'exam_id');
    }
}
