<?php

use Illuminate\Support\Facades\Route;
use Modules\CartItem\Http\Controllers\FeeController;
use Modules\CartItem\Http\Controllers\PaymentController;


Route::post('/add-to-cart', 'StoreController@addToCart')->name('add_to_cart');
Route::post('/remove-to-cart', 'DeleteController@removeFromCart')->name('cart.remove');
Route::get('/cart-items/{user_id}/courses', 'ShowController@show')->name('cart.courses');
Route::post('/add-list-to-cart', 'StoreController@addList');


Route::post('payment', [FeeController::class, 'payment'])->name('payment');
Route::get('/verify', [FeeController::class, 'verify'])->name('verify');


Route::post('/webhook', [FeeController::class, 'handleWebhook']);
