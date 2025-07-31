<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Services\OrderService;

Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

Route::post('/test-post', function (Request $request) {
    return response()->json(['message' => 'POST works', 'data' => $request->all()]);
});

// Ruta simple para crear órdenes sin problemas de CSRF
Route::post('/create-order', function (Request $request) {
    $orderService = new OrderService();
    $order = $orderService->createOrder($request->all());
    return response()->json($order, 201);
});

// Rutas manuales para orders
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::get('/orders', [OrderController::class, 'index']); 