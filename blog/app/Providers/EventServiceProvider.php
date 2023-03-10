<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
       
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}


// use App\Notifications\VerifyEmailNotification;
// use Illuminate\Auth\Events\Registered;
// use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

// class EventServiceProvider extends ServiceProvider
// {
//     protected $listen = [
//         Registered::class => [
//             SendEmailVerificationNotification::class,
//         ],
//     ];

//     public function boot()
//     {
//         VerifyEmailNotification::createUrlUsing(function ($notifiable) {
//             return URL::temporarySignedRoute(
//                 'verification.verify',
//                 now()->addMinutes(60),
//                 ['id' => $notifiable->getKey()]
//             );
//         });
//     }
// }
