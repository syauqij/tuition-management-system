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

    protected $appends = ['studentName'];

    protected function studentName(): Attribute
    {
        return Attribute::make(
          get: fn($value, $attributes) =>
            json_decode($attributes['student_profile'])->first_name . ' ' .
            json_decode($attributes['student_profile'])->last_name
        );
    }

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
        ->where('course_id', $courseId)
        ->where('status', 'accepted');
    }

    public function scopeStudentName($query, $name)
    {
      return $query->whereRaw("CONCAT(
          json_unquote(json_extract(student_profile, '$.first_name')),
          ' ',
          json_unquote(json_extract(student_profile, '$.last_name'))
        ) LIKE ?", ['%' . $name . '%']
      );
    }

    public function scopeStudentProfile($query, $key, $value)
    {
      return
        $query->orWhere('student_profile->' . $key, 'like', '%' . $value . '%');
    }
}
