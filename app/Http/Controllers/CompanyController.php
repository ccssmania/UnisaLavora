<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class CompanyController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('activate');
    }

    
    public function show($id){
        $company = User::find($id)->user;
        return view('company.company',compact("company"));
    }
}
