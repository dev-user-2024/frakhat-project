<?php

use Illuminate\Support\Facades\Route;
use Modules\TeachingRequest\Http\Controllers\DeleteController;
use Modules\TeachingRequest\Http\Controllers\ShowIndexController;
use Modules\TeachingRequest\Http\Controllers\StatusController;
use Modules\TeachingRequest\Http\Controllers\StoreController;

Route::get('teachingRequest', [ShowIndexController::class, 'index'])
    ->name('teachingRequest.index');

Route::view('teachingRequest/create', 'teachingRequest::teachingRequest.create')
    ->name('teachingRequest.create');

Route::post('teachingRequest/store', [StoreController::class, 'store'])
    ->name('teachingRequest.store');

Route::delete('teachingRequest/delete/{id}', [DeleteController::class, 'delete'])
    ->name('teachingRequest.delete');

Route::patch('teachingRequest/{teachingRequest}/approve', [StatusController::class, 'approve'])
    ->name('teachingRequest.approve');

Route::patch('teachingRequest/{teachingRequest}/reject', [StatusController::class, 'reject'])
    ->name('teachingRequest.reject');
