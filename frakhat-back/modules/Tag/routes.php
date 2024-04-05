<?php

use Illuminate\Support\Facades\Route;
use Modules\Tag\Http\Controllers\DeleteController;
use Modules\Tag\Http\Controllers\ShowCreateController;
use Modules\Tag\Http\Controllers\ShowEditController;
use Modules\Tag\Http\Controllers\ShowIndexController;
use Modules\Tag\Http\Controllers\StoreController;
use Modules\Tag\Http\Controllers\UpdateController;

Route::get('tag', [ShowIndexController::class, 'index'])
    ->name('tag.index');

Route::get('tag/create', [ShowCreateController::class, 'create'])
    ->name('tag.create');

Route::post('tag/store', [StoreController::class, 'store'])
    ->name('tag.store');

Route::get('tag/edit/{id}', [ShowEditController::class, 'edit'])
    ->name('tag.edit');

Route::put('tag/update/{id}', [UpdateController::class, 'update'])
    ->name('tag.update');

Route::delete('tag/delete/{id}', [DeleteController::class, 'delete'])
    ->name('tag.delete');

