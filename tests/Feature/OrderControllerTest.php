<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Order;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_order()
    {
        $orderData = [
            'customer_name' => 'Juan Pérez',
            'customer_email' => 'juan@example.com',
            'total' => 100.00,
            'status' => 'pending'
        ];

        $order = Order::create($orderData);

        $this->assertDatabaseHas('orders', $orderData);
        $this->assertEquals('Juan Pérez', $order->customer_name);
    }

    public function test_can_get_order()
    {
        $order = Order::create([
            'customer_name' => 'Juan Pérez',
            'customer_email' => 'juan@example.com',
            'total' => 100.00,
            'status' => 'pending'
        ]);

        $foundOrder = Order::find($order->id);

        $this->assertNotNull($foundOrder);
        $this->assertEquals('Juan Pérez', $foundOrder->customer_name);
    }
} 