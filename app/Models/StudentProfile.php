<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'parent_profile_id',
      'mykad',
      'gender',
      'birthdate',
      'street_1',
      'street_2',
      'postcode',
      'city',
      'state',
      'country',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parentProfile()
    {
        return $this->belongsTo(ParentProfile::class, 'parent_profile_id');
    }

}
