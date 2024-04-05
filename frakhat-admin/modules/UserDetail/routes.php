<?php

use Illuminate\Support\Facades\Route;
use Modules\UserDetail\Http\Controllers\DeleteController;
use Modules\UserDetail\Http\Controllers\ShowCreateController;
use Modules\UserDetail\Http\Controllers\ShowEditController;
use Modules\UserDetail\Http\Controllers\ShowIndexController;
use Modules\UserDetail\Http\Controllers\ShowInfoController;
use Modules\UserDetail\Http\Controllers\StoreController;
use Modules\UserDetail\Http\Controllers\UpdateController;
use Modules\UserDetail\Http\Controllers\UpdateProfileController;

Route::get('userDetail/{role}', [ShowIndexController::class, 'index'])
    ->name('userDetail.index');

Route::get('userDetail/create/{role}', [ShowCreateController::class, 'create'])
    ->name('userDetail.create');

Route::post('userDetail/store', [StoreController::class, 'store'])
    ->name('userDetail.store');

Route::get('userDetail/edit/{role}/{id}', [ShowEditController::class, 'edit'])
    ->name('userDetail.edit');

Route::put('userDetail/update/{id}', [UpdateController::class, 'update'])
    ->name('userDetail.update');

Route::delete('userDetail/delete/{id}', [DeleteController::class, 'delete'])
    ->name('userDetail.delete');

Route::get('userDetail/info/{role}/{id}', [ShowInfoController::class, 'info'])
    ->name('userDetail.info');

Route::view('userDetail/account/profile', 'userDetail::userDetail.profile')
    ->name('userDetail.profile');

Route::put('userDetail/account/profile/update/{id}', [UpdateProfileController::class, 'update'])
    ->name('userDetail.profile.update');

Route::put('userDetail/account/profile/change-password', [UpdateProfileController::class, 'changePassword'])
    ->name('userDetail.change-password');
