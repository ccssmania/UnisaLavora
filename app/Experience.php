<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{

	protected $table = "experience";
    protected $fillable = [
        'student_id', 'skill_name','file_ext'
    ];
    
    public $timestamps = null;
}
