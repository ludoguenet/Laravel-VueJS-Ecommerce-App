<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', fn(Request $request) => $request->user());

    Route::get('cart/count', [CartController::class, 'count'])
        ->name('cart.count');
    Route::put('cart/decrease/{rowId}', [CartController::class, 'decreaseQuantity'])
        ->name('api.cart.decrease');
    Route::put('cart/increase/{rowId}', [CartController::class, 'increaseQuantity'])
        ->name('api.cart.increase');
    Route::apiResource('cart', CartController::class);
});

