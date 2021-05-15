<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $url, $for, $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($for, $token)
    {
        $this->url = config('app.url');
        $this->for = $for;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch ($this->for) {
            case 'registration':
                $this->url .= "/verify?token=$this->token";
                return $this->subject("Registration Successful | Verify Account")->markdown('email.registration')->withUrl($this->url);
                break;
            case 'reset_password':
                $this->url .= "/reset_password?token=$this->token";
                return $this->subject("Reset Password ")->markdown('email.password_reset')->withUrl($this->url);
                break;
            case 'verify_account':
                $this->url .= "/verify?token=$this->token";
                return $this->subject("Verify Your Email")->markdown('email.account_verfication')->withUrl($this->url);
                break;
        }
    }
}
