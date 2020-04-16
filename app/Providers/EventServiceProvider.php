<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserLoginEvent' => [
            'App\Listeners\WelcomeMessage',
            'App\Listeners\SendWelcomeMail',

        ],

        'App\Events\SaveDataNotificationEvent' => [
            'App\Listeners\SaveDataNotificationMessage',
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
