<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Cache;

class OrderService
{
    public function createOrder(array $data): Order
    {
        return Order::create($data);
    }

    public function getOrder(int $id): ?Order
    {
        return Cache::remember("order.{$id}", 3600, function () use ($id) {
            return Order::find($id);
        });
    }
} 