<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InEntrevistaRequest extends Model
{
    protected $table = 'in_entrevista_request';

    protected $fillable = [
    	'user_id','oferta_id','status'
    ];
}
