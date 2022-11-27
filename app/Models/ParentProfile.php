<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'phone_no',
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

    public function childProfile()
    {
        return $this->hasOne(ChildProfile::class);
    }

}
