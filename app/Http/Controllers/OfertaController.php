<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use App\Oferta;
use Session;
use Validator;
class OfertaController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('activate');
    }

    public function index($id){
    	$company = User::find($id)->user;
    	$ofertas = $company->ofertas()->where('status',1)->paginate(20);
    	return view('ofertas.index',compact("ofertas", "company"));
    }
    public function create($user_id){
    	if($user_id == \Auth::user()->id){
	    	$user = User::find($user_id);
	    	$oferta = new Oferta();
	    	return view('ofertas.create',compact("oferta","user"));
    	}else{
    		Session::flash("errorMessage", \Lang::get('project.permissions'));
    		return redirect("/");
    	}
    }

    public function save(Request $request, $user_id){
    	if(\Auth::user()->id == $user_id){
    		$oferta = new Oferta();
    		$oferta->user_id = $user_id;
    		$oferta->title = $request->title;
    		$oferta->description = $request->description;
    		if($oferta->save()){
    			$validator = Validator::make($request->all(), [
		             'ofr' => 'mimes:pdf|max:10000',
		         ]);

		        if ($validator->fails())
		        {
		        	$oferta->delete();
		            return redirect()->back()->withErrors($validator)->withInput();
		        }
    			if(isset($request->ofr)){
	                $request->ofr->storeAs('ofr',"$oferta->id".".pdf");
	            }
    			Session::flash("message", \Lang::get('project.ofert')." ".\Lang::get("project.saved"));
    			return redirect("/oferts/$user_id");
    		}
    	}else{
    		Session::flash("errorMessage", \Lang::get('project.permissions'));
    		return redirect("/");
    	}
    }

    public function edit($user_id, $ofert_id){
    	if($user_id == \Auth::user()->id){
	    	$user = User::find($user_id);
	    	$oferta = Oferta::find($ofert_id);
	    	if($oferta->user_id == $user_id){

	    		return view('ofertas.edit',compact("oferta","user"));
	    	}else{
	    		Session::flash("errorMessage", \Lang::get('project.permissions'));
	    		return redirect("/");
	    	}
    	}else{
    		Session::flash("errorMessage", \Lang::get('project.permissions'));
    		return redirect("/");
    	}
    }
    public function update(Request $request, $user_id, $ofert_id){
    	if($user_id == \Auth::user()->id){
	    	$user = User::find($user_id);
	    	$oferta = Oferta::find($ofert_id);
	    	if($oferta->user_id == $user_id){
	    		if(isset($request->ofr)){
	                $this->validate($request,[
	                    'ofr' => 'mimes:pdf|max:10000',
	                ]);
	                $request->ofr->storeAs('ofr',"$oferta->id".".pdf");
	                
	            }
	    		if(isset($request->title)){
	    			$oferta->title = $request->title;
	    		}
	    		if(isset($request->description)){
	    			$oferta->description = $request->description;
	    		}
	    		if($oferta->save()){
	    			Session::flash('message',\Lang::get('project.updated'));
	    			return redirect('/oferts/'.$user->id);
	    		}
	    	}else{
	    		Session::flash("errorMessage", \Lang::get('project.permissions'));
	    		return redirect("/");
	    	}
    	}else{
    		Session::flash("errorMessage", \Lang::get('project.permissions'));
    		return redirect("/");
    	}
    }

    public function delete($id){
    	$oferta = Oferta::find($id);
    	$oferta->status = 0;
    	$user = $oferta->user;
    	if($oferta->save()){
    		Session::flash('message',\Lang::get('project.updated'));
    		return redirect("/oferts/$user->id");
    	}
    }

}

