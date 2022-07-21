<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Nationality;
use App\Models\Country;
use Auth;


class UserController extends Controller
{



    public function index(){

    	$users = User::get();
		return view('Admin.users.index',compact('users'));
	}


	public function add(Request $request){
				
		$nationalities = Nationality::orderBy('name')->get();
		$countries = Country::orderBy('vCountry')->get();

		return view('Admin.users.add',compact('nationalities','countries'));
	}


}
