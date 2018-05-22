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
}
