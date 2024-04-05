<?php

use Illuminate\Support\Facades\Route;
use Modules\AdBanner\Http\Controllers\DeleteController;
use Modules\AdBanner\Http\Controllers\ShowCreateController;
use Modules\AdBanner\Http\Controllers\ShowEditController;
use Modules\AdBanner\Http\Controllers\ShowIndexController;
use Modules\AdBanner\Http\Controllers\StoreController;
use Modules\AdBanner\Http\Controllers\UpdateController;


use Modules\AdBanner\Http\Controllers\CourseBanner\DeleteController as DeleteCourseBanner;
use Modules\AdBanner\Http\Controllers\CourseBanner\ShowCreateController as ShowCreateCourseBanner;
use Modules\AdBanner\Http\Controllers\CourseBanner\ShowEditController as ShowEditCourseBanner;
use Modules\AdBanner\Http\Controllers\CourseBanner\ShowIndexController as IndexCourseBanner;
use Modules\AdBanner\Http\Controllers\CourseBanner\StoreController as StoreCourseBanner;
use Modules\AdBanner\Http\Controllers\CourseBanner\UpdateController as UpdateCourseBanner;

Route::get('adBanner', [ShowIndexController::class, 'index'])
    ->name('adBanner.index');

Route::get('adBanner/create', [ShowCreateController::class, 'create'])
    ->name('adBanner.create');

Route::post('adBanner/store', [StoreController::class, 'store'])
    ->name('adBanner.store');

Route::get('adBanner/edit/{id}', [ShowEditController::class, 'edit'])
    ->name('adBanner.edit');

Route::put('adBanner/update/{id}', [UpdateController::class, 'update'])
    ->name('adBanner.update');

Route::delete('adBanner/delete/{id}', [DeleteController::class, 'delete'])
    ->name('adBanner.delete');

Route::get('courseBanner', [IndexCourseBanner::class, 'index'])
    ->name('courseBanner.index');

Route::get('courseBanner/create', [ShowCreateCourseBanner::class, 'create'])
    ->name('courseBanner.create');

Route::post('courseBanner/store', [StoreCourseBanner::class, 'store'])
    ->name('courseBanner.store');

Route::get('courseBanner/edit/{id}', [ShowEditCourseBanner::class, 'edit'])
    ->name('courseBanner.edit');

Route::put('courseBanner/update/{id}', [UpdateCourseBanner::class, 'update'])
    ->name('courseBanner.update');

Route::delete('courseBanner/delete/{id}', [DeleteCourseBanner::class, 'delete'])
    ->name('courseBanner.delete');
