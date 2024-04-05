<?php

use Illuminate\Support\Facades\Route;
use Modules\Banner\Http\Controllers\DeleteController;
use Modules\Banner\Http\Controllers\ShowCreateController;
use Modules\Banner\Http\Controllers\ShowEditController;
use Modules\Banner\Http\Controllers\ShowIndexController;
use Modules\Banner\Http\Controllers\StoreController;
use Modules\Banner\Http\Controllers\UpdateController;

Route::get('banner', [ShowIndexController::class, 'index'])
    ->name('banner.index');

Route::get('banner/create', [ShowCreateController::class, 'create'])
    ->name('banner.create');

Route::post('banner/store', [StoreController::class, 'store'])
    ->name('banner.store');

Route::get('banner/edit/{id}', [ShowEditController::class, 'edit'])
    ->name('banner.edit');

Route::put('banner/update/{id}', [UpdateController::class, 'update'])
    ->name('banner.update');

Route::delete('banner/delete/{id}', [DeleteController::class, 'delete'])
    ->name('banner.delete');

