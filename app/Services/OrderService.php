<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function createOrder(array $data): Order
    {
        return Order::create($data);
    }

    public function getOrder(int $id): ?Order
    {
        return Order::find($id);
    }
} 