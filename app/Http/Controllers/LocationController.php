<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index($language){
    	if($language === "spanish"){
    		App::setlocale('es');
    	}elseif($language === "english"){
    		App::setlocale('en');
    	}elseif($language === "italian"){
    		App::setlocale('it');
    	}
    }
}
