<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffProfile extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
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
}
