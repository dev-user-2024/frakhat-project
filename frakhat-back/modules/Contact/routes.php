<?php

use Illuminate\Support\Facades\Route;
use Modules\Contact\Http\Controllers\DeleteController;
use Modules\Contact\Http\Controllers\DeleteSubscriberController;
use Modules\Contact\Http\Controllers\DeleteUsController;
use Modules\Contact\Http\Controllers\ShowIndexController;
use Modules\Contact\Http\Controllers\ShowIndexMarketingController;
use Modules\Contact\Http\Controllers\ShowIndexSubscriberController;
use Modules\Contact\Http\Controllers\ShowIndexUsController;


Route::get('contact', [ShowIndexController::class, 'index'])
    ->name('contact.index');

Route::delete('contact/delete/{id}', [DeleteController::class, 'delete'])
    ->name('contact.delete');


Route::get('contact-us', [ShowIndexUsController::class, 'index'])
    ->name('contactUs.index');

Route::delete('contact-us/delete/{id}', [DeleteUsController::class, 'delete'])
    ->name('contactUs.delete');

Route::get('subscriber', [ShowIndexSubscriberController::class, 'index'])
    ->name('subscriber.index');

Route::delete('subscriber/delete/{id}', [DeleteSubscriberController::class, 'delete'])
    ->name('subscriber.delete');

Route::get('contact-marketing', [ShowIndexMarketingController::class, 'index'])
    ->name('contactMarketing.index');
