<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Catalog\CatalogController;

Route::get('/catalog', [CatalogController::class, 'catalog'])->name('catalog.catalog');

Route::get('/catalog/more/{url}', [CatalogController::class, 'more'])->name('catalog.more');

Route::middleware('auth', 'permission:admin')->group(function(){
    Route::get('/catalog/add', [CatalogController::class, 'add'])->name('catalog.add');

    Route::post('/catalog/add_do', [CatalogController::class, 'add_do'])->name('catalog.add_do');

    Route::get('/catalog/delete/{id}', [CatalogController::class, 'delete'])->name('catalog.delete');

    Route::get('/catalog/edit/{id}', [CatalogController::class, 'edit'])->name('catalog.edit');

    Route::post('/catalog/edit_do', [CatalogController::class, 'edit_do'])->name('catalog.edit_do');

    Route::get('/catalog/add_condition', [CatalogController::class, 'add_condition'])->name('catalog.add_condition');

    Route::get('/catalog/add_condition_do', [CatalogController::class, 'add_condition_do'])->name('catalog.add_condition_do');

    Route::get('/catalog/delete_condition/{id}', [CatalogController::class, 'delete_condition'])->name('catalog.delete_condition');

    Route::get('/catalog/edit_condition/{id}', [CatalogController::class, 'edit_condition'])->name('catalog.edit_condition');

    Route::post('/catalog/edit_condition_do', [CatalogController::class, 'edit_condition_do'])->name('catalog.edit_condition_do');
});
