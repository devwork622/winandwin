<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyRegister extends Model
{
    protected $table = 'verify_register';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'otp',
        'mobile',
        'created_at',
    ];


    public function verify_code($email,$code){

        $verify_data = VerifyRegister::select("*")->where('email',$email)->where('otp',$code)->orderBy('id','DESC')->first();        
        if(!empty($verify_data)) {
            return '1';
        } else {
            return '0';
        }

    }
}
