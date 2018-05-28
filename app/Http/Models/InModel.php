<?php

namespace App\Http\Models;


use App\InEntrevistaRequest;
use App\User;
use App\Company;
use Carbon\Carbon;
use Illuminate\Support\Collection;
class InModel {
    
    
    public static function getInterviews($user_id = null, $d = null){
        $in = InEntrevistaRequest::query();
        $user = User::find($user_id);
        $in->where('status',0);

        if(isset($user) ? $user->roll == env("STUDENT") : false){
            $in->where("user_id", $user_id);
        }elseif(isset($user) ? $user->roll == env("COMPANY") : false){
            $ofertas = $user->user->ofertas;
            $colection = collect();
            foreach ($ofertas as $oferta) {
                $interviews =$oferta->apply()->where('status',0)->whereDate("created_at", 'like', $d)->get();
                if($interviews->count() > 0){
                    
                    $interviews->put('name', $oferta->title);
                    $colection->push($interviews);
                }
            }
            return $colection;
        }

        if(isset($d)){
            $in->whereDate("created_at", 'like', $d);
        }
        return $in->get()->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('y-m-d');
                    });    
    }
    public static function getAcceptedInterview($user_id = null, $d = null){
        $in = InEntrevistaRequest::query();
        $user = User::find($user_id);
        $in->where('status',1);

        if(isset($user) && $user->roll == env("STUDENT")){
            $in->where("user_id", $user_id);
        }elseif(isset($user) && $user->roll == env("COMPANY")){
            $ofertas = $user->user->ofertas;
            $colection = collect();
            foreach ($ofertas as $oferta) {
                $interviews = $oferta->apply()->where('status',1)->whereDate("created_at", 'like', $d)->get();
                if($interviews->count() > 0){

                    $interviews->put('name', $oferta->title);
                    $colection->push($interviews);
                }
            }
            return $colection;
        }

        if(isset($d)){
            $in->whereDate("created_at", 'like', $d);
        }

        return $in->get()->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('y-m-d');
                    });    
    }
    public static function getRejectedInterview($user_id = null, $d = null){
        $in = InEntrevistaRequest::query();
        $user = User::find($user_id);
        $in->where('status',2);

        if(isset($user) && $user->roll == env("STUDENT")){
            $in->where("user_id", $user_id);
        }elseif(isset($user) && $user->roll == env("COMPANY")){
            $ofertas = $user->user->ofertas;
            $colection = collect();
            foreach ($ofertas as $oferta) {
                $interviews = $oferta->apply()->where('status',2)->whereDate("created_at", 'like', $d)->get();
                if($interviews->count() > 0){
                    
                    $interviews->put('name', $oferta->title);
                    $colection->push($interviews);
                }
            }
            return $colection;
        }

        if(isset($d)){
            $in->whereDate("created_at", 'like', $d);
        }
        return $in->get()->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('y-m-d');
                    });    
    }
    
    
}
