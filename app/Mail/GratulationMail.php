<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GratulationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $user;
    private $certificate_id;
    public function __construct($user,$id_c)
    {
        $this->user=$user;
        $this->certificate_id=$id_c;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user=$this->user;
        $id_c=$this->certificate_id;
        return $this->subject('Gratulation')->view('emails.gratulation',compact('user','id_c'));
    }
}
