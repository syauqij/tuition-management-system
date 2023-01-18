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

    protected $casts = [
      'student_profile' => 'array',
      'parent_profile' => 'array',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_user_id');
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

    public static function getAddress($address)
    {
      return
         $address['street_1'] . ', ' . $address['street_2'] . '<br/>' .
         $address['postcode'] . ', ' . $address['city'] . '<br/>' .
         $address['state'] . ', ' . $address['country'];
    }

    public function scopeEnroledStudents($query, $courseId)
    {
      return $query
        ->with('student', 'student.studentProfile')
        ->where('course_id', $courseId)
        ->where('status', 'accepted');
    }
}
