<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactMessage extends Mailable
{
    use Queueable, SerializesModels;
    public $sender_name;
    public $reciever_name;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender_name, $reciever_name, $message)
    {
        $this->sender_name = $sender_name;
        $this->reciever_name = $reciever_name;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.name');
    }
}
