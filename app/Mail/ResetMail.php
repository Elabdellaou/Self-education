<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $user;
    private $key = 'ibrahim';
    private $iv = '1234521478569874';
    public function __construct($u)
    {
        $this->user=$u;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->user->id=openssl_encrypt($this->user->id, 'AES-256-CBC', $this->key, 0, $this->iv);
        $user=$this->user;
        $access=openssl_encrypt('selfeducation2022', 'AES-256-CBC', $this->key, 0, $this->iv);
        return $this->subject('Reset Password')->view('emails.reset-password',compact('user','access'));
    }
}
