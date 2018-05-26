<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;
use App\User;
use App\InEntrevistaRequest;
use App\Entrevista;
use App\Notifications\InterviewAccepted;
use App\Notifications\InterviewReject;
class InterviewController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('activate');
    }
    
    public function accept(Request $request, $user_id, $oferta_id){
    	$in = InEntrevistaRequest::where("user_id",$user_id)->where("oferta_id", $oferta_id)->first();
    	$in->status = 1;
    	$in->save();
    	$entrevista = new Entrevista();
    	$entrevista->user_id = $user_id;
    	$entrevista->oferta_id = $oferta_id;
    	$entrevista->date = $request->date;
    	$entrevista->company_id = $in->oferta->user->user->id;

    	if($entrevista->save()){

    		\Session::flash("message", \Lang::get('project.i_accepted'));
    		return \Response::make(200);
    	} 
    }

    public function reject( $user_id, $oferta_id){
    	$in = InEntrevistaRequest::where("user_id",$user_id)->where("oferta_id", $oferta_id)->first();
    	$in->status = 2;
    	if($in->save()){
    		\Session::flash("message", \Lang::get('project.i_rejected'));
    		return \Response::make(200);
    	}
    }
}
