<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'slug',
      'description',
      'subject_category_id',
      'monthly_fee',
      'main_photo_path'
    ];

    public function subjectCategory()
    {
        return $this->belongsTo(SubjectCategory::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function courseSubjects()
    {
      return $this->hasMany(CourseSubject::class, 'course_id');
    }

    public function enrolments()
    {
      return $this->hasMany(Enrolment::class, 'course_id');
    }

    public function enroledStudents()
    {
      return $this->hasMany(Enrolment::class, 'course_id')
        ->where('status', 'accepted');
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($course) {
            $course->slug = $course->createSlug($course->name);
            $course->save();
        });
    }

    private function createSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if (is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
