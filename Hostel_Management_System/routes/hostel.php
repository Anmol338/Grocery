<?php

use App\Http\Controllers\HostelController;
use Illuminate\Support\Facades\Route;

// Route::get('/hostel', function () {
//     return view('hostel.hostel');
// })->name('hostel');

Route::get('/hostel', [HostelController::class, 'index'])->name('hostel');
Route::get('/hostel/create', [HostelController::class, 'create'])->name('hostel.create');
Route::post('/hostel/create',[HostelController::class, 'store'])->name('hostel.store');