<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

Route::redirect('/', '/admin');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Panel admin
    Route::prefix('admin')->name('admin.')->group(function () {

        // Dashboard admin
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Resources
        Route::resource('roles', RoleController::class)->names('roles');
        Route::resource('users', UserController::class);
    });

    // Dashboard normal
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});
