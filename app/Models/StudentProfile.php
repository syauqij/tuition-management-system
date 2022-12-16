<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\Address;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function address(): Attribute
    {
      return Attribute::make(
          get: fn ($value, $attributes) => new StudentProfile(
              $attributes['street_1'],
              $attributes['street_2'],
              $attributes['postcode'],
              $attributes['city'],
              $attributes['state'],
              $attributes['country'],
          ),
      );
    }
}
