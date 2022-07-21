<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $code;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$code)
    {
        //
        $this->name =  $name;
        $this->email =  $email;
        $this->code =  $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = env('APP_NAME').' -- Email Verification';
        return $this->subject($subject)->view('auth.email.email-verification')->with([
            'name' => $this->name,
            'email' => $this->email,
            'code' => $this->code
        ]);
     
    }
}
