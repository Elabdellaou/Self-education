<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $mailData='';
    public function __construct($mailData)
    {
        $this->mailData=$mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name=$this->mailData->name;
        return $this->subject('Welcome To Self Education')->view('emails.welcome',compact('name'));
    }
}
