<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
	use Notifiable;
    protected $fillable = [
        'name', 'phone', 'address', 'user_id'
    ];
    protected $table = "company";

    public $timestamps = null;
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function ofertas(){
    	return $this->hasMany('App\Oferta', 'user_id','user_id');
    }
}
