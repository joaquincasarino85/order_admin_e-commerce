<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Order;

class SendOrderNotification implements ShouldQueue
{
    use Queueable;

    public Order $order;

    /**
     * Create a new job instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Simulate sending email
        \Log::info('Sending order notification email', [
            'order_id' => $this->order->id,
            'customer_email' => $this->order->customer_email,
            'customer_name' => $this->order->customer_name,
            'total' => $this->order->total
        ]);

        // Simulate email delay
        sleep(1);

        \Log::info('Order notification email sent successfully', [
            'order_id' => $this->order->id
        ]);
    }
}
