<?php

namespace App\Base\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Base\Events\ExampleEvent::class => [
            \App\Base\Listeners\ExampleListener::class,
        ],
    ];
}
