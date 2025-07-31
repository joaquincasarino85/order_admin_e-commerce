<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

// API Routes (temporary)
Route::get('/api/test', function () {
    return response()->json(['message' => 'API is working']);
});

Route::apiResource('/api/orders', OrderController::class);
