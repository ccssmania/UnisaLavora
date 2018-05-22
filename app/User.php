<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'roll', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user(){
        if($this->roll == env("COMPANY"))
            return $this->hasOne('App\Company');
        if($this->roll == env("STUDENT"))
            return $this->hasOne('App\Student');
        if($this->roll == env("ADMINISTRATOR"))
            return $this->hasOne('App\Administrator');
    }

    public function ofertas(){
        return $this->belongsToMany('App\Oferta', ' in_entrevista_request', 'user_id', 'oferta_id');
    }
}
