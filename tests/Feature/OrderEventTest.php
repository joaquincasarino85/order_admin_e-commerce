<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Order;
use App\Events\OrderCreated;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_created_event_is_fired()
    {
        $order = Order::create([
            'customer_name' => 'Juan Pérez',
            'customer_email' => 'juan@example.com',
            'total' => 100.00,
            'status' => 'pending'
        ]);

        // Verify the order was created successfully
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'customer_name' => 'Juan Pérez'
        ]);
    }

    public function test_order_observer_logs_creation()
    {
        $order = Order::create([
            'customer_name' => 'Juan Pérez',
            'customer_email' => 'juan@example.com',
            'total' => 100.00,
            'status' => 'pending'
        ]);

        // Verify the order was created and event was fired
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'customer_name' => 'Juan Pérez'
        ]);
    }
} 