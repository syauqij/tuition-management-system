<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{
    use HasFactory;

    protected $fillable = [
      'enrolment_id',
      'classroom_id',
    ];

    public function enrolment()
    {
        return $this->belongsTo(Enrolment::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
