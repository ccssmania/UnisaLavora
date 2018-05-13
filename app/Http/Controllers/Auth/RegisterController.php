<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\Company;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\ConfirmActivation;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user= new User();
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        
        $user->roll = $data['roll'];
        if($user->save())
        {
            if($data['roll'] == env("COMPANY")){
                $company = new Company();
                $company->name = $data['name'];
                $company->phone = $data['phone'];
                $company->user_id = $user->id;
                $company->address = $data['address'];
                $company->dni = $data['dni'];
                if($company->save()){
                    Session::flash("message", "User Created");
                    $users = User::where('roll',0)->get();
                    Notification::send($users, new UserActivate("hola"));
                    return redirect("/home");
                }else{
                    Session::flash("errorMessage", "Something was wrong");
                    return redirect("/register");
                }
            }elseif($data['roll'] == env("STUDENT")){

                $student = new Student();
                $student->name = $data['name'];
                $student->phone = $data['phone'];
                $student->address = $data['address'];
                $student->user_id = $user->id;
                $student->id = $data['id'];
                if($student->save()){
                    $users = User::where('roll',0)->get();
                    Notification::send($users, new UserActivate("hola"));
                    Session::flash("message", "User Created");
                    return redirect("/home");
                }else{
                    Session::flash("errorMessage", "Something was wrong");
                    return redirect("/register");
                }
            }
        }else{
            Session::flash("errorMessage", "Something was wrong");
            return redirect("/register");
        }
    }
}
