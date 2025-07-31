<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_order_via_api()
    {
        $orderData = [
            'customer_name' => 'Juan Pérez',
            'customer_email' => 'juan@example.com',
            'total' => 100.00,
            'status' => 'pending'
        ];

        $response = $this->postJson('/api/orders', $orderData);

        $response->assertStatus(201);
        $response->assertJson([
            'customer_name' => 'Juan Pérez',
            'customer_email' => 'juan@example.com',
            'total' => '100.00',
            'status' => 'pending'
        ]);
    }

    public function test_can_get_order_via_api()
    {
        $order = \App\Models\Order::create([
            'customer_name' => 'Juan Pérez',
            'customer_email' => 'juan@example.com',
            'total' => 100.00,
            'status' => 'pending'
        ]);

        $response = $this->getJson("/api/orders/{$order->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $order->id,
            'customer_name' => 'Juan Pérez'
        ]);
    }
} 