<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Student; 
class UserController extends Controller
{
    public function userComplete(Request $request){
        $companies = Company::where('name', 'like', "%{$request->term}%")->limit(10)->orderBy('name')->get();
        $students = Student::where('name', 'like', "%{$request->term}%")->limit(10)->orderBy('name')->get();
        $userData = [];
        foreach ($companies as $company) {
            $user = new \stdClass();
            $user->label = $company->name. ' : ' . \Lang::get('project.company');
            $user->value  = $company->user->id;
            $userData[] = $user;
        }
        foreach ($students as $student) {
            $user = new \stdClass();
            $user->label = $student->name. ' : ' . \Lang::get('project.student');
            $user->value  = $student->user->id;
            $userData[] = $user;
        }
        echo json_encode($userData);
    }
}
