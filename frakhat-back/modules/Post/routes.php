<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\DeleteController;
use Modules\Post\Http\Controllers\ShowCreateController;
use Modules\Post\Http\Controllers\ShowEditController;
use Modules\Post\Http\Controllers\ShowIndexController;
use Modules\Post\Http\Controllers\StatusController;
use Modules\Post\Http\Controllers\StoreController;
use Modules\Post\Http\Controllers\UpdateController;

Route::get('post/{type}', [ShowIndexController::class, 'index'])
    ->name('post.index');

Route::get('post/create/{type}', [ShowCreateController::class, 'create'])
    ->name('post.create');

Route::post('post/store', [StoreController::class, 'store'])
    ->name('post.store');

Route::get('post/edit/{id}', [ShowEditController::class, 'edit'])
    ->name('post.edit');

Route::put('post/update/{id}', [UpdateController::class, 'update'])
    ->name('post.update');

Route::delete('post/delete/{id}', [DeleteController::class, 'delete'])
    ->name('post.delete');

Route::patch('post/{post}/approve', [StatusController::class, 'approve'])
    ->name('post.approve');

Route::patch('post/{post}/reject', [StatusController::class, 'reject'])
    ->name('post.reject');
