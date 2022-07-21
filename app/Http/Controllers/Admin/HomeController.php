<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    public function index(){

		return view('Admin.login');
	}


	public function dashboard() {
		
		return redirect()->route('admin-users');
	}

}
