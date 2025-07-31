<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\OrderService;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderServiceTest extends TestCase
{
    use RefreshDatabase;

    private OrderService $orderService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->orderService = new OrderService();
    }

    public function test_can_create_order()
    {
        $orderData = [
            'customer_name' => 'Juan Pérez',
            'customer_email' => 'juan@example.com',
            'total' => 100.00,
            'status' => 'pending'
        ];

        $order = $this->orderService->createOrder($orderData);

        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals('Juan Pérez', $order->customer_name);
        $this->assertDatabaseHas('orders', $orderData);
    }

    public function test_can_get_order()
    {
        $order = Order::create([
            'customer_name' => 'Juan Pérez',
            'customer_email' => 'juan@example.com',
            'total' => 100.00,
            'status' => 'pending'
        ]);

        $foundOrder = $this->orderService->getOrder($order->id);

        $this->assertInstanceOf(Order::class, $foundOrder);
        $this->assertEquals('Juan Pérez', $foundOrder->customer_name);
    }
} 