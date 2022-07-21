<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\VerifyRegister;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use Mail;
use App\Mail\VerifyEmail;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {

    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'username' => $data['username'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

     public function postRegister(Request $request)
    {

        $messages = [
            'email.unique' => __('Email is already exists.'),
        ];

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
          //  'phone_code' => ['numeric'],
            'mobile' => ['numeric'],
            ], $messages);  

        if ($validator->fails()) {
            return redirect('register-user')->with('errors',$validator->errors());
        }  
        $data = $request->all();
        
        
        
        $password = $data['password'];

        


        $user = new User;
        $user_data['first_name'] = $data['first_name'];
        $user_data['last_name'] = $data['last_name'];
        $user_data['email'] = $data['email']; 
        $user_data['phone_code'] = '';  
        $user_data['mobile'] = $data['mobile'];  
        $user_data['password'] = Crypt::encrypt($data['password']);          
        $new_user =  $user->create($user_data);

        
        // $user = new User;
        // $user->sendNewRegisterMail($new_user_profile,$password);

        //return ['success' => true,'message' => __('Your registration completed.')];
        return redirect('/')->with('register_message',__('Your registration has been completed.'));
    }

    public function check_email(Request $request){
        $email = $request->input('email');
        $return_val = true;
        if(!empty($email)) {
            $user_model = new User;
            $user = $user_model->check_email($email);
            if(!empty($user)){
                $return_val = false;
            }
        }
        return response()->json($return_val);
    }

    public function check_mobile(Request $request){
        $mobile = $request->input('mobile');
        $return_val = true;
        if(!empty($mobile)) {
            $user_model = new User;
            $user = $user_model->check_mobile($mobile);
            if(!empty($user)){
                $return_val = false;
            }
        }
        return response()->json($return_val);
    }

    public function verify_email_request(Request $request){
        $email = $request->input('email');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        

        $verify_data = [];
        $verify_data['email'] = $email;
        $verify_data['otp'] = $otp_code = mt_rand(100000,999999);
        $verify_data['type'] = 'email';
        $verify_data['created_at'] = NOW();
        
        $verify_register_model = new VerifyRegister;
        $verify_register_model->create($verify_data);
        
        $name = $first_name.' '.$last_name;
        Mail::to($email)->send(new VerifyEmail($name,$email,$otp_code));

        $return_arr = [];
        $return_arr['success'] = '1';
        return response()->json($return_arr);
    }

    public function verify_email(Request $request){
        $email = $request->input('email');
        $code = $request->input('code');
        $success = '0';

        $verify_register_model = new VerifyRegister;
        $verify  = $verify_register_model->verify_code($email, $code);
        
        if($verify == '1') {
            $success = '1';
        }


        $return_arr = [];
        $return_arr['success'] = $success;
        return response()->json($return_arr);
    }
}
