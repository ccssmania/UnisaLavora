<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ConfirmActivation;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Route;
class PerfilController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('activate');
    }


    public function index(){
    	$user = Auth::user();
    	return view('perfil.index',compact('user'));
    }

    public function edit($id){
    	$user = User::find($id);
        $file = storage_path("app/cvs/$user->id.pdf");
    	return view('perfil.edit', compact('user'));
    }

    public function update(Request $request,$id)
    {
        ini_set('memory_limit','256M');

        $user = User::find($id);
        $user_sc = $user->user;
        if(isset($request->file)){
            $this->validate($request,[
                'file' => 'mimes:jpg,png,jpeg',
            ]);
            $image = Image::make($request->file)->encode('jpg')->save(storage_path('app/images/'.$user->id.'.jpg'));
        }

        if(isset($request->namespace))
            $user_sc->name = $request->name;
        if(isset($user->address))
            $user_sc->address = $request->address;
        if(isset($request->phone))
            $user_sc->phone = $request->phone;

        if(isset($request->email)){
            $this->validate($request,[
                'email' => 'email|max:255|unique:users',
            ]);
            $user->email = $request->email;
            
        }
        if($user->roll == env("COMPANY")){
            if(isset($request->id)){
                $this->validate($request,[
                    'id' => 'unique:company',
                ]);
                $user_sc->id = $request->id;
            }

            
        }
        if($user->roll == env("STUDENT")){
            if(isset($request->id)){
                $this->validate($request,[
                    'id' => 'unique:student',
                ]);
                $user_sc->id = $request->id;
            }
            if(isset($request->cv)){
                $this->validate($request,[
                    'cv' => 'mimes:pdf|max:10000',
                ]);
                $request->cv->storeAs('cvs',"$user->id".".pdf");
                
            }
            
        }

        if($user_sc->save() && $user->save()){
            Session::flash("message","User Updated!");
            return redirect('/perfil');
        }else{
            Session::flash("errorMessage","Something was wrong!");
            return redirect('/perfil');
        }


    }
}
