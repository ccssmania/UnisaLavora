<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrevista extends Model
{
    protected $table = 'entrevistas';

    protected $fillable = [
    	'student_id','oferta_id','date','created_at', 'updated_at'
    ];
}
