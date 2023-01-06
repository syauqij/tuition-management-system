<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'room_no',
      'course_subject_id',
      'school_grade_id',
      'teacher_user_id',
      'min_students',
      'max_students'
    ];
}
