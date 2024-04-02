<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\AdminDashboardController;
use App\Http\Controllers\Web\AuthenticationController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\UserDashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home.index');

    Route::controller(AuthenticationController::class)->group(function () {

        Route::get('/login', 'create')
            ->name('auth.create');

        Route::post('/login', 'store')
            ->name('auth.store');
    });
});

Route::middleware('auth')->group(function () {

    // admin dashboard
    Route::controller(AdminDashboardController::class)->group(function () {

        Route::get('/admin/dashboard', 'index')
            ->name('admin.dashboard.index');
    });

    // user dashboard
    Route::controller(UserDashboardController::class)->group(function () {

        Route::get('/user/dashboard', 'index')
            ->name('user.dashboard.index');
    });

    // users
    Route::controller(UserController::class)->group(function () {

        Route::get('/users', 'index')
            ->name('users.index');

        Route::get('/users/create', 'create')
            ->name('users.create');

        Route::post('/users', 'store')
            ->name('users.store');

        Route::get('/users/{user}/edit', 'edit')
            ->name('users.edit');

        Route::put('/users/{user}', 'update')
            ->name('users.update');
    });
});