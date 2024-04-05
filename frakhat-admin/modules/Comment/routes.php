<?php

use Illuminate\Support\Facades\Route;
use Modules\Comment\Http\Controllers\DeleteController;
use Modules\Comment\Http\Controllers\ShowIndexController;
use Modules\Comment\Http\Controllers\StatusController;

Route::get('comment/{type}', [ShowIndexController::class, 'index'])
    ->name('comment.index');

Route::delete('comment/delete/{id}', [DeleteController::class, 'delete'])
    ->name('comment.delete');

Route::patch('comments/{comment}/approve', [StatusController::class, 'approve'])
    ->name('comment.approve');

Route::patch('comments/{comment}/reject', [StatusController::class, 'reject'])
    ->name('comment.reject');
