<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/login';


    public function reset_password(Request $request){
            $this->validate($request, [
                    'token' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|confirmed|min:6',
            ]);

            $credentials = $request->only(
                    'email', 'password', 'password_confirmation', 'token'
            );
            
            $user = new User;
            $user  = $user->check_email($request->input('email'));
            if(!empty($user)){
                $password = $request->input('password');
                $this->resetMyPassword($user, $password);

                //Delete the token
                DB::table('password_resets')->where('email', $user->email)->delete();

                return redirect('login')->with('message','Password has been changed.');
            } else {
                return redirect()->back()->withErrors(['email' => 'Email not found']);
                //$response =
                //return $this->getResetFailureResponse($request, $response);
            }   
            
    }

    public function resetMyPassword($user, $password){
        $user->password = Crypt::encrypt($password); 
        return $user->save();
    }
}
