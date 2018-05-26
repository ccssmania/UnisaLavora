<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
class Student extends Model
{
	use Notifiable;
    protected $fillable = [
        'name', 'phone', 'cv', 'address', 'id', 'user_id'
    ];
    protected $table = "student";
    public $timestamps = null;

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function experience(){
    	return $this->hasMany('App\Experience');
    }

    public function interviews(){
        return $this->hasMany('App\InEntrevistaRequest', 'user_id', 'user_id');
    }

    public function age(){
        $date = new \DateTime((string)$this->birthday);
        $to = new \DateTime('today');
        return $date->diff($to)->y;
    }
}
