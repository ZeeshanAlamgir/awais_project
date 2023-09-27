<?php

namespace App\Listeners;

use App\Events\SendHugRegMailEvent;
use App\Events\SendRegistrationMailEvent;
use App\Mail\HugMail;
use App\Mail\RegistrationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendHugMailListener
{
    /**
     * Create the event listener.
     */
    public $email = '';
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendHugRegMailEvent $event)
    {
        $this->email = $event->email;
        return Mail::to($this->email)->send(new HugMail());
    }
}
