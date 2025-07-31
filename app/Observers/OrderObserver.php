<?php

namespace App\Observers;

use App\Models\Order;
use App\Events\OrderCreated;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        // Dispatch the OrderCreated event
        event(new OrderCreated($order));
        
        // Log the order creation
        \Log::info('Order created', [
            'order_id' => $order->id,
            'customer_name' => $order->customer_name,
            'total' => $order->total
        ]);
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
