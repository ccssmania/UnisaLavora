<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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
    public function apply(){
        return $this->hasMany('App\InEntrevistaRequest','oferta_id');
    }
    public function applies(){
        return $this->apply()->where('status',0)->get();
    }
    public function applies_accepted(){
        return $this->apply()->where('status',1)->get();
    }
    public function applies_rejected(){
        return $this->apply()->where('status',2)->get();
    }
    public function student($id){
    	return $this->students()->where('user_id',$id)->where('status',0)->first();
    }
    public function student_status($id){
        return $this->students()->where('user_id',$id)->first();
    }
    public function users_apply(){
        return $this->belongsToMany('App\User', 'in_entrevista_request', 'oferta_id', 'user_id')->wherePivot('status',0);
    }
    public function users_cancel(){
        return $this->belongsToMany('App\User', 'in_entrevista_request', 'oferta_id', 'user_id')->wherePivot('status',4);
    }
    public function users_rejected(){
        return $this->belongsToMany('App\User', 'in_entrevista_request', 'oferta_id', 'user_id')->wherePivot('status',2);
    }


    public function users_accepted(){
        return $this->belongsToMany('App\User', 'in_entrevista_request', 'oferta_id', 'user_id')->wherePivot('status',1);
    }
}
