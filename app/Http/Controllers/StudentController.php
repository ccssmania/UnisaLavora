<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('activate');
    }


    public function index($id){
    	$student = User::Find($id);
    	foreach ($student->unreadNotifications as $notification) {
    		if($notification->data['type'] === "interview_request_student"){
    			$notification->markAsRead();
    		}
    	}
    	if(\Auth::user()->id == $id){
    		$interviews = $student->user->interviews()->where('status',0)->get();
    		return view('candidates.myRequests', compact("interviews","student"));
    	} 
    }

    public function show($id){
        $student = User::find($id)->user;
        return view('candidates.candidate',compact("student"));
    }
}
