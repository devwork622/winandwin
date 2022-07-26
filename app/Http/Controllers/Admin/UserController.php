<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Nationality;
use App\Models\Country;
use Auth;
use Illuminate\Support\Facades\Crypt;


class UserController extends Controller
{



    public function index(){

    	$users = User::where('role','1')->orderBy('created_at','desc')->get();
    	
		return view('Admin.users.index',compact('users'));
	}


	public function add(Request $request){
				
		$nationalities = Nationality::orderBy('name')->get();
		$countries = Country::orderBy('vCountry')->get();

		return view('Admin.users.add',compact('nationalities','countries'));
	}

	public function edit($id,Request $request){
		$user = User::where('id',$id)->first();

		$nationalities = Nationality::orderBy('name')->get();
		$countries = Country::orderBy('vCountry')->get();

		return view('Admin.users.edit',compact('nationalities','countries','user'));
	}

	public function store(Request $request){
		$id = $request->input('id');
        
		
        $data = $request->except('_token');
        $date_of_birth_arr = explode("/", $data['date_of_birth']);
        $data['date_of_birth'] = $date_of_birth_arr['2'].'-'.$date_of_birth_arr['1'].'-'.$date_of_birth_arr['0'];
        

        $user = new User;
        if(!empty($id) && $id > 0) {
        	$new_user = $user->where('id',$id)->update($data);
        	$return_arr = [];
        	$return_arr['success'] = '1';
        	$return_arr['redirect_url'] = route('admin-users');        	
        	$return_arr['message'] = __('User updated successfully.');
        	return response()->json($return_arr);

        } else {
        	$data['role'] = '1';
        	$data['password'] = Crypt::encrypt('123456');;              	
        	$new_user = $user->create($data);

        	$return_arr = [];
        	$return_arr['success'] = '1';
        	$return_arr['redirect_url'] = route('admin-users');        	
        	$return_arr['message'] = __('User added successfully.');
        	return response()->json($return_arr);
        }


	}


	public function delete($id,Request $request){
		
		if(!empty($id)){
			User::where('id',$id)->delete();
			$return_arr = [];
        	$return_arr['success'] = '1';
        	$return_arr['redirect_url'] = route('admin-users');        	
        	$return_arr['message'] = __('User deleted successfully.');
        	return response()->json($return_arr);
		}

	}

}
