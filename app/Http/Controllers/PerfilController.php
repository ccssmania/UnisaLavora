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
use App\Experience;
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
        if(isset($request->skills_name)){
            for($i = 0; $i<count($request->skills_name) ; $i++){
                if(isset($request->skills_name[$i])){
                    $experience = new Experience();
                    $experience->student_id = $user->user->id;
                    $experience->skill_name = $request->skills_name[$i];
                    if(isset($request->skills_file[$i])){
                        $experience->file_ext = $request->skills_file[$i]->extension();
                        $request->skills_file[$i]->storeAs('exp',$experience->skill_name.'_'.$user->id.'.'.$experience->file_ext);
                        $experience->save();
                    }else{
                        $experience->save();
                    }
                }
            }
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

            if (isset($request->birthday)) {

                $user_sc->birthday = $request->birthday;
            }
            
        }
        if($user_sc->save() && $user->save()){
            Session::flash("message", \Lang::get("project.user_updated"));
            return redirect('/perfil');
        }else{
            Session::flash("errorMessage",\Lang::get("project.wrong"));
            return redirect('/perfil');
        }


    }

    public function deleteSkill($exp_id){
        Experience::find($exp_id)->delete();
    }
}
