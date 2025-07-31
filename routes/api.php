<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

Route::apiResource('orders', OrderController::class); 