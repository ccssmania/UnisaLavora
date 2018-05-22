<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function home(){
        $user = Auth::user();
        if(isset($user)){
            if($user->roll == env("COMPANY")){
                $users = User::where('roll',env("STUDENT"))->where('active', 1)->paginate(20);
                return view('main.main', compact("users"));
            }elseif($user->roll == env("STUDENT")){
                $users = User::where('roll',env("COMPANY"))->where('active', 1)->paginate(20);
                return view('main.main', compact("users"));
            }elseif($user->roll == env("ADMINISTRATOR")){
                $users = User::where('roll','!=',0)->paginate(20);
                return view('main.main', compact("users"));
            }else{
                return redirect('/home');
            }
        }else{
            return redirect("/home");
        }
    }
}
