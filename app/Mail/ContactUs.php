<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;
    public $details = [];
    /**
     * Create a new message instance.
     */
    public function __construct(object $details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->subject('Contact Us')
        ->view('mail.contact-us', ['details'=>$this->details]);
    }
}
