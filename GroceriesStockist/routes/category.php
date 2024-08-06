<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    // Category routes
    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/create', [CategoryController::class, 'insert'])->name('category.create');
    Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/{id}/edit', [CategoryController::class, 'update'])->name('category.edit');
    Route::get('category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.delete');
    // Category routes
});
