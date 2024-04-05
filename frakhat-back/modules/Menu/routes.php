<?php

use Illuminate\Support\Facades\Route;
use Modules\Menu\Http\Controllers\Menu\CreateController as MenuCreate;
use Modules\Menu\Http\Controllers\Menu\DeleteController as MenuDelete;
use Modules\Menu\Http\Controllers\Menu\ShowEditController as MenuEdit;
use Modules\Menu\Http\Controllers\Menu\ShowIndexController as MenuIndex;
use Modules\Menu\Http\Controllers\Menu\StoreController as MenuStore;
use Modules\Menu\Http\Controllers\Menu\UpdateController as MenuUpdate;
use Modules\Menu\Http\Controllers\Section\ShowIndexController as SectionIndex;
use Modules\Menu\Http\Controllers\Tab\CreateController as TabCreate;
use Modules\Menu\Http\Controllers\Tab\DeleteController as TabDelete;
use Modules\Menu\Http\Controllers\Tab\ShowEditController as TabEdit;
use Modules\Menu\Http\Controllers\Tab\ShowIndexController as TabIndex;
use Modules\Menu\Http\Controllers\Tab\StoreController as TabStore;
use Modules\Menu\Http\Controllers\Tab\UpdateController as TabUpdate;

Route::get('menu', [MenuIndex::class, 'index'])->name('menu.index');
Route::get('menu/create', [MenuCreate::class, 'create'])->name('menu.create');
Route::post('menu/store', [MenuStore::class, 'store'])->name('menu.store');
Route::get('menu/edit/{id}', [MenuEdit::class, 'edit'])->name('menu.edit');
Route::put('menu/update/{id}', [MenuUpdate::class, 'update'])->name('menu.update');
Route::delete('menu/delete/{id}', [MenuDelete::class, 'delete'])->name('menu.delete');

Route::get('menu/section', [SectionIndex::class, 'index'])->name('menu.section.index');

Route::get('menu/tab', [TabIndex::class, 'index'])->name('menu.tab.index');
Route::get('menu/tab/create', [TabCreate::class, 'create'])->name('menu.tab.create');
Route::post('menu/tab/store', [TabStore::class, 'store'])->name('menu.tab.store');
Route::get('menu/tab/edit/{id}', [TabEdit::class, 'edit'])->name('menu.tab.edit');
Route::put('menu/tab/update/{id}', [TabUpdate::class, 'update'])->name('menu.tab.update');
Route::delete('menu/tab/delete/{id}', [TabDelete::class, 'delete'])->name('menu.tab.delete');
