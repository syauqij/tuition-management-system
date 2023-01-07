<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Enrolment extends Model
{
    use HasFactory;

    protected $fillable = [
      'student_user_id',
      'student_profile',
      'parent_profile',
      'course_id',
      'subject_category_id',
      'subject_id',
      'status'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_user_id')
        ->with('studentProfile');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function classStudents()
    {
        return $this->hasMany(ClassStudent::class, 'enrolment_id');
    }

    protected function studentProfile(): Attribute
    {
        return Attribute::make(
          get: fn($value, $attributes) => json_decode($attributes['student_profile'])
        );
    }

    protected function parentProfile(): Attribute
    {
        return Attribute::make(
          get: fn($value, $attributes) => json_decode($attributes['parent_profile'])
        );
    }

    public function scopeGetAddress($query, $id, $column)
    {
      $profile = $query->where('id', $id)
        ->get()
        ->first();

      $val = $profile->$column;
      $address = $val->street_1 . ', ' . $val->street_2 . '<br/>' .
              $val->postcode . ', ' . $val->city . '<br/>' .
              $val->state . ', ' . $val->country;

      return $address;
    }

    public function scopeEnroledStudents($query, $courseId)
    {
      return $query
        ->with('student', 'student.studentProfile')
        ->where('course_id', $courseId)
        ->where('status', 'accepted');
    }
}
