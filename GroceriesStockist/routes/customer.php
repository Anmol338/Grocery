<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('customer', [CustomerController::class, 'index'])->name('customer');
Route::middleware('auth')->group(function () {
    // Category routes
    Route::get('customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('customer/create', [CustomerController::class, 'insert'])->name('customer.create');
    Route::get('customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('customer/{id}/edit', [CustomerController::class, 'update'])->name('customer.edit');
    Route::get('customer/{id}/delete', [CustomerController::class, 'delete'])->name('customer.delete');
    // Category routes
});