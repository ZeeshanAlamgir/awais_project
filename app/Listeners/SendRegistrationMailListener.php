<?php

namespace App\Listeners;

use App\Events\SendRegistrationMailEvent;
use App\Mail\RegistrationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendRegistrationMailListener
{
    /**
     * Create the event listener.
     */
    public $email = '', $username = '';
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendRegistrationMailEvent $event)
    {
        $this->email = $event->details['email'];
        $this->username = $event->details['username'];
        
        return Mail::to($this->email)->send(new RegistrationMail($this->username));
    }
}
