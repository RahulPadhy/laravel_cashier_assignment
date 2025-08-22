<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CheckoutController;
// use App\Http\Controllers\ReceiptController;

// Route::get('/', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
// Route::post('/checkout/{id}', [CheckoutController::class, 'checkout'])->name('checkout');

// Route::get('/receipt/{id}', [ReceiptController::class, 'show'])->name('receipt');
// Route::get('/orders', [ReceiptController::class, 'all'])->name('orders');

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReceiptController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::post('/create-payment-intent/{id}', [CheckoutController::class, 'createPaymentIntent'])->name('payment.intent');
Route::post('/process-payment/{id}', [CheckoutController::class, 'processPayment'])->name('payment.process');

Route::get('/receipt/{id}', [ReceiptController::class, 'show'])->name('receipt');
Route::get('/orders', [ReceiptController::class, 'all'])->name('orders');


