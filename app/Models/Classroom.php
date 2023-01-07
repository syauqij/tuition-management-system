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

    public function courseSubject()
    {
        return $this->belongsTo(CourseSubject::class);
    }

    public function schoolGrade()
    {
        return $this->belongsTo(SchoolGrade::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_user_id');
    }

    public function classStudents()
    {
        return $this->hasMany(ClassStudent::class);
    }
}
