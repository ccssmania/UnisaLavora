<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ConfirmActivation;
class ActivateController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('guest_admin');
    }
    public function index(){
    	$users = User::where('active', 0)->orderBy('created_at','desc')->get();
    	$user = Auth::user();
    	foreach ($user->unreadNotifications as $notification) {
    		if(isset($notification->data['type']) && $notification->data['type'] == "user_activate")
    			$notification->markAsRead();
    	}
    	return view('activate.index',compact("users"));
    }

    public function activate($id){
        $user = User::find($id);
        $user->active = 1;
        if($user->save()){
            Session::flash("message", \Lang::get("project.user_activated"));
            $user->notify(new ConfirmActivation());
            return redirect("/activate");
        }
    }

    public function ignore($id){
        $user = User::find($id);
        if($user->user->delete())
            if($user->delete()){
                $user->delete();
                Session::flash("message",\Lang::get("project.user_ignored"));
                return redirect("/activate");
            }else{
                Session::flash("errorMessage",\Lang::get("project.wrong"));
                return redirect("/activate");
            }
        else{
            Session::flash("errorMessage",\Lang::get("project.wrong"));
            return redirect("/activate");
        }
    }
}
