<?php

use Illuminate\Support\Facades\Route;
use Modules\Job\Http\Controllers\Job\ShowIndexController as IndexJob;
use Modules\Job\Http\Controllers\Job\StoreController as StoreJob;
use Modules\Job\Http\Controllers\Job\ShowEditController as EditJob;
use Modules\Job\Http\Controllers\Job\UpdateController as UpdateJob;
use Modules\Job\Http\Controllers\Job\DeleteController as DeleteJob;
use Modules\Job\Http\Controllers\Job\ShowCreateController as CreateJob;
use Modules\Job\Http\Controllers\Resume\ShowIndexController as IndexResume;
use Modules\Job\Http\Controllers\Company\ShowIndexController as IndexCompany;
use Modules\Job\Http\Controllers\Company\StoreController as StoreCompany;
use Modules\Job\Http\Controllers\Company\ShowEditController as EditCompany;
use Modules\Job\Http\Controllers\Company\UpdateController as UpdateCompany;
use Modules\Job\Http\Controllers\Company\DeleteController as DeleteCompany;

Route::get('jobs/company', [IndexCompany::class, 'index'])
    ->name('company.index');

Route::view('jobs/company/create', 'job::company.create')
    ->name('company.create');

Route::post('jobs/company/store', [StoreCompany::class, 'store'])
    ->name('company.store');

Route::get('jobs/company/edit/{id}', [EditCompany::class, 'edit'])
    ->name('company.edit');

Route::put('jobs/company/update/{id}', [UpdateCompany::class, 'update'])
    ->name('company.update');

Route::delete('jobs/company/delete/{id}', [DeleteCompany::class, 'delete'])
    ->name('company.delete');



Route::get('jobs/resume', [IndexResume::class, 'index'])
    ->name('resume.index');


Route::get('jobs/job', [IndexJob::class, 'index'])
    ->name('job.index');

Route::get('jobs/job/create', [CreateJob::class, 'create'])
    ->name('job.create');

Route::post('jobs/job/store', [StoreJob::class, 'store'])
    ->name('job.store');

Route::get('jobs/job/edit/{id}', [EditJob::class, 'edit'])
    ->name('job.edit');

Route::put('jobs/job/update/{id}', [UpdateJob::class, 'update'])
    ->name('job.update');

Route::delete('jobs/job/delete/{id}', [DeleteJob::class, 'delete'])
    ->name('job.delete');

