<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    private $data='';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($d)
    {
        $this->data=$d;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $info=$this->data;
        return $this->subject('Communication or help')->view('emails.contact',compact('info'));
    }
}
