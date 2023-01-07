<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    protected $table = 'course_subject';
    use HasFactory;

    protected $fillable = [
      'course_id',
      'subject_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
