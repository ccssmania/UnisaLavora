<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Administrator extends Model
{
	use Notifiable;
    protected $fillable = [
        'name', 'user_id'
    ];
    protected $table = "administrator";

    public $timestamps = null;
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
