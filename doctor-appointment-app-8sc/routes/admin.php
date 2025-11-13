<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function() {
        return view('admin.dashboard');
    })->name('dashboard');

    // gestión de roles
    Route::resource('roles', RoleController::class)->names('roles');

    // gestión de usuarios
    Route::get('users/index', [UserController::class, 'index'])
        ->name('users.index'); // ← CORREGIDO

});
