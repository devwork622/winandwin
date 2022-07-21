<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Session;
use DB;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function submitLogin(Request $request){

        
        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            $user = new User;
            $success = 0;
            $error_message = '';
            $from_mobile = $request->input('from_mobile');
            $mobile = $request->input('mobile');
            $phone_code = $request->input('phone_code');
            
            if($from_mobile == '1') {
                $user = $user->checkUser($request->input('mobile'),$request->input('password'),'1',$phone_code);            
            } else {
                $user = $user->checkUser($request->input('email'),$request->input('password'));
                
            }


            if(!empty($user)){
                    
                Auth::login($user);
                $success = 1;                                       
                    
            }

            if($success) {
                return redirect('/')->with("success", __("Your are logged in now."));    
            } else {
                return redirect()->back()->withInput()->with('error', __("Please enter valid credentials.") ); 
            }
                 
        }

        return redirect()->back()->withInput()->with('error',$validator->errors()->all() );

    }

    public function submitAdminLogin(Request $request){

        
        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            $user = new User;
            $success = 0;
            $error_message = '';
            $from_mobile = $request->input('from_mobile');
            $mobile = $request->input('mobile');
            $phone_code = $request->input('phone_code');
            
            $user = $user->checkAdmin($request->input('email'),$request->input('password'));
                
            


            if(!empty($user)){
                    
                Auth::login($user);
                $success = 1;                                       
                    
            }

            if($success) {
                return redirect()->route('admin-dashboard')->with("success", __("Your are logged in now."));    
            } else {
                return redirect()->back()->withInput()->with('error', __("Please enter valid credentials.") ); 
            }
                 
        }

        return redirect()->back()->withInput()->with('error',$validator->errors()->all() );

    }

    // protected function loggedOut(Request $request) {


    //         $user = Auth::user();
    //         if($user->role == '0') {
    //             return redirect('admin-login');
    //         } else {
    //             return redirect('login');    
    //         }

            

    // }

    public function logout()
    {   
        $user = Auth::user();
        $role = $user->role;
        Auth::logout();
        
        if($role == '0') {
                return redirect()->route('admin-login');
        } else {
                return redirect('login');    
        }        
    }
}
