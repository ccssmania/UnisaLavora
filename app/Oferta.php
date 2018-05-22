<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $fillable = [
        'user_id', 'description', 'status',
    ];
    protected $table = "ofertas";

    public function user(){
    	return $this->belongsTo("App\User");
    }

    public function users(){
    	return $this->belongsToMany('App\User', 'in_entrevista_request', 'oferta_id', 'user_id');
    }

    public function students(){
    	return $this->hasMany('App\InEntrevistaRequest');
    }

    public function student($id){
    	return $this->students()->where('user_id',$id)->first();
    }
}
