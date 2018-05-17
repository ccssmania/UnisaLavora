<?php

namespace App;

use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
    public function user(){
    	return $this->belongsTo('App\User', 'notifiable_id');
    }
}
