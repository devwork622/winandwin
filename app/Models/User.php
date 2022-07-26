<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_code',
        'mobile',
        'credit',
        'role',
        'paypal_email',
        'gender',
        'date_of_birth',
        'nationality_id',
        'country_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function checkUser($email,$password,$check_with_mobile = '0',$phone_code = ''){
        if($check_with_mobile) {
            $user = User::select("*")->where('phone_code',$phone_code)->where('mobile',$email)->where('role','1')->first();        
        } else {
            $user = User::select("*")->where('email',$email)->where('role','1')->first();            
        }
        if(!empty($user)){
            $user_password = $user->password;
            if(Crypt::decrypt($user_password) == $password){
                return $user;
            } else {
                return '';
            }
        }
        return '';
    }


    public function checkAdmin($email,$password){
        $user = User::select("*")->where('email',$email)->where('role','0')->first();            
        
        if(!empty($user)){
            $user_password = $user->password;
            if(Crypt::decrypt($user_password) == $password){
                return $user;
            } else {
                return '';
            }
        }
        return '';
    }


    public function check_email($email,$id = ''){
        $user = User::select("*")->where('email',$email);
        if(!empty($id)){
            $user = $user->where('id','<>',$id);
        }
        $user = $user->first();
        if(!empty($user)){
            return $user;
        }
        return false;
    }

    public function check_mobile($mobile,$id = ''){
        $user = User::select("*")->where('mobile',$mobile);
        if(!empty($id)){
            $user = $user->where('id','<>',$id);
        }
        $user = $user->first();
        if(!empty($user)){
            return $user;
        }
        return false;
    }

    

    
}
