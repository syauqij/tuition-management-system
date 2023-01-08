<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_no',
        'role',
        'is_active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
          get: fn($value, $attributes) => $attributes['first_name']. ' ' . $attributes['last_name']
        );
    }

    public function studentProfile()
    {
        return $this->hasOne(StudentProfile::class);
    }

    public function staffProfile()
    {
        return $this->hasOne(StaffProfile::class);
    }

    public function enrolments()
    {
        return $this->hasMany(Enrolment::class, 'student_user_id');
    }

    public function scopeGetUserProfile($query, $role, $userID)
    {
      if($role == 'student') {
        $query
          ->where('role', 'student')
          ->with('studentProfile')
          ->with('studentProfile.parentProfile');
      }
      else {
        $query
          ->whereIn('role', ['teacher', 'finance', 'admin'])
          ->with('staffProfile');
      }

      $query->where('id', $userID);

      return $query;
    }
}
