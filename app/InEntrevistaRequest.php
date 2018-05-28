<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InEntrevistaRequest extends Model
{
    protected $table = 'in_entrevista_request';

    protected $fillable = [
    	'user_id','oferta_id','status'
    ];

    public function oferta(){
    	return $this->belongsTo('App\Oferta');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }


}
