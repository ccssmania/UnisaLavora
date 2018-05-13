<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'student_id', 'description'
    ];

    $timestamps = null;
}
