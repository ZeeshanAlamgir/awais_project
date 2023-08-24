<?php

namespace App\Providers;

use App\Events\SendRegistrationMailEvent;
use App\Http\Repo\HugsIncReg\RegistrationInterface;
use App\Http\Repo\HugsIncReg\RegistrationService;
use App\Listeners\SendRegistrationMailListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendRegistrationMailEvent::class => [
            SendRegistrationMailListener::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        $this->app->bind(RegistrationInterface::class, RegistrationService::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
