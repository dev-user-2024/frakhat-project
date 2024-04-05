<?php

use Illuminate\Support\Facades\Route;
use Modules\Discount\Http\Controllers\CreateDiscountController;
use Modules\Discount\Http\Controllers\CreateDiscountMarketerController;
use Modules\Discount\Http\Controllers\DiscountUsageController;
use Modules\Discount\Http\Controllers\IndexCartController;
use Modules\Discount\Http\Controllers\IndexDiscountController;
use Modules\Discount\Http\Controllers\IndexDiscountMarketerController;
use Modules\Discount\Http\Controllers\IndexFeeController;
use Modules\Discount\Http\Controllers\IndexOrderController;
use Modules\Discount\Http\Controllers\IndexSpotPlayerController;
use Modules\Discount\Http\Controllers\StoreDiscountController;
use Modules\Discount\Http\Controllers\StoreDiscountMarketerController;


Route::get('discount/marketer/create', [CreateDiscountMarketerController::class, 'create'])
    ->name('discount.marketer.create');

Route::post('discount/marketer/store', [StoreDiscountMarketerController::class, 'store'])
    ->name('discount.marketer.store');

Route::get('discount/marketer', [IndexDiscountMarketerController::class, 'index'])
    ->name('discount.marketer.index');

Route::get('discount/create/{type}', [CreateDiscountController::class, 'create'])
    ->name('discount.create');

Route::post('discount/store', [StoreDiscountController::class, 'store'])
    ->name('discount.store');

Route::get('discount/{type}', [IndexDiscountController::class, 'index'])
    ->name('discount.index');

Route::get('discountUsage', [DiscountUsageController::class, 'index'])
    ->name('discount.usage.index');


Route::get('order', [IndexOrderController::class, 'index'])
    ->name('order.index');

Route::get('fee', [IndexFeeController::class, 'index'])
    ->name('fee.index');

Route::get('cart', [IndexCartController::class, 'index'])
    ->name('carts.index');

Route::get('licenses', [IndexSpotPlayerController::class, 'index'])
    ->name('licenses.index');
