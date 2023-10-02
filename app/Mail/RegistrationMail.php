<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user = '';
    public function __construct($username)
    {
        $this->user = $username;
    }

    public function build()
    {
        $user = $this->user;
        return $this->subject('Pre Registration Mail')
        ->view('mail.registration-mail', ['user'=>$user]);
    }
}
