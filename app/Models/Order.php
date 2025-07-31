<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Order",
 *     title="Order",
 *     description="Modelo de orden",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="customer_name", type="string", example="Juan Pérez"),
 *     @OA\Property(property="customer_email", type="string", format="email", example="juan@example.com"),
 *     @OA\Property(property="total", type="number", format="float", example=150.50),
 *     @OA\Property(property="status", type="string", example="pending"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_email', 
        'total',
        'status'
    ];
}
