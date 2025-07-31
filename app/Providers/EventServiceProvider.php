<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as BaseEventServiceProvider;
use App\Events\OrderCreated;
use App\Listeners\SendOrderNotificationListener;

class EventServiceProvider extends BaseEventServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        parent::boot();

        $this->listen = [
            OrderCreated::class => [
                SendOrderNotificationListener::class,
            ],
        ];
    }
}
