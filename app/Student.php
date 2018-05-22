<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
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
}
