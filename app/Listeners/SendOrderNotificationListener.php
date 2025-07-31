<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Jobs\SendOrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOrderNotificationListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        // Dispatch the job to send email notification
        SendOrderNotification::dispatch($event->order);
    }
}
