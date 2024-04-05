<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\DeleteController;
use Modules\Category\Http\Controllers\ShowCreateController;
use Modules\Category\Http\Controllers\ShowEditController;
use Modules\Category\Http\Controllers\ShowIndexController;
use Modules\Category\Http\Controllers\StoreController;
use Modules\Category\Http\Controllers\UpdateController;


Route::get('category/{type}', [ShowIndexController::class, 'index'])
    ->name('category.index');

Route::get('category/create/{type}', [ShowCreateController::class, 'create'])
    ->name('category.create');

Route::post('category/store', [StoreController::class, 'store'])
    ->name('category.store');

Route::get('category/edit/{id}', [ShowEditController::class, 'edit'])
    ->name('category.edit');

Route::put('category/update/{id}', [UpdateController::class, 'update'])
    ->name('category.update');

Route::delete('category/delete/{id}', [DeleteController::class, 'delete'])
    ->name('category.delete');




