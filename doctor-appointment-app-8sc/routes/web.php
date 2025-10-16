<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/' , '/admin');
//Route::get('/', function () {
//    return view('welcome');
// });

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard2', [AdminController::class, 'dashboard2'])->name('admin.dashboard2');
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/billing', [AdminController::class, 'billing'])->name('admin.billing');
    Route::get('/invoice', [AdminController::class, 'invoice'])->name('admin.invoice');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
