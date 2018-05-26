<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('activate');
    }

    public function index($type, $id){
    	$notification = Notification::find($id);
        if($notification->notifiable_id == \Auth::user()->id){
            
        	if($type === "user_activate"){
        		return redirect("/activate");
        	}else
        	{
        		$notification->markAsRead();
        		return view('notification.show', compact("notification"));
        	}
        }
    }
}
