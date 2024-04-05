<?php

use Illuminate\Support\Facades\Route;
use Modules\Language\Http\Controllers\DeleteController;
use Modules\Language\Http\Controllers\ShowEditController;
use Modules\Language\Http\Controllers\ShowIndexController;
use Modules\Language\Http\Controllers\StoreController;
use Modules\Language\Http\Controllers\UpdateController;

Route::get('language', [ShowIndexController::class, 'index'])
    ->name('language.index');

Route::view('language/create', 'language::language.create')
    ->name('language.create');

Route::post('language/store', [StoreController::class, 'store'])
    ->name('language.store');

Route::get('language/edit/{id}', [ShowEditController::class, 'edit'])
    ->name('language.edit');

Route::put('language/update/{id}', [UpdateController::class, 'update'])
    ->name('language.update');

Route::delete('language/delete/{id}', [DeleteController::class, 'delete'])
    ->name('language.delete');

