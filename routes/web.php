<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('checkout', [CheckoutController::class, 'create'])
    ->name('checkout.create');
Route::post('paymentIntent', [CheckoutController::class, 'paymentIntent'])
    ->name('checkout.paymentIntent');
Route::resource('products', ProductController::class);
Route::get('shoppingCart', [CartController::class, 'index'])
    ->name('cart.index');

Route::resource('orders', OrderController::class);

Route::get('/clear', function () {
    \Cart::session(auth()->user()->id)->clear();
});

Route::get('/dashboard', function () {
    $orders = auth()->user()->orders;
    return view('dashboard', compact('orders'));
})->middleware(['auth'])->name('dashboard');

Route::get('/thankyou', fn() => 'Merci de votre commande!');

require __DIR__.'/auth.php';
