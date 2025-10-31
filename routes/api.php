<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\PaymentController;
use App\Http\Controllers\Api\V1\PizzaController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\ToppingController;

Route::prefix('v1')->group(function () {
    Route::apiResource('customers', CustomerController::class)->only(['index','show','store', 'update']);
    Route::apiResource('orders', OrderController::class)->only(['index','show','store']);
    Route::apiResource('pizzas', PizzaController::class)->only(['index','show','store']);
    Route::apiResource('toppings', ToppingController::class)->only(['index','show','store']);

    Route::post('payments', [PaymentController::class, 'store']);
    // Mark a payment as successful
    Route::post('payments/{payment_id}/pay', [PaymentController::class, 'pay']);
    // Mark a payment as failed
    Route::post('payments/{payment_id}/fail', [PaymentController::class, 'fail']);

});
