<?php

use Illuminate\Support\Facades\Route;
use Modules\CategoryUser\Http\Controllers\DeleteController;
use Modules\CategoryUser\Http\Controllers\ShowCreateController;
use Modules\CategoryUser\Http\Controllers\ShowEditController;
use Modules\CategoryUser\Http\Controllers\ShowIndexController;
use Modules\CategoryUser\Http\Controllers\StoreController;
use Modules\CategoryUser\Http\Controllers\UpdateController;

Route::get('categoryUser', [ShowIndexController::class, 'index'])
    ->name('categoryUser.index');

Route::get('categoryUser/create', [ShowCreateController::class, 'create'])
    ->name('categoryUser.create');

Route::post('categoryUser/store', [StoreController::class, 'store'])
    ->name('categoryUser.store');

Route::get('categoryUser/edit/{id}', [ShowEditController::class, 'edit'])
    ->name('categoryUser.edit');

Route::put('categoryUser/update/{id}', [UpdateController::class, 'update'])
    ->name('categoryUser.update');

Route::delete('categoryUser/delete/{id}', [DeleteController::class, 'delete'])
    ->name('categoryUser.delete');

