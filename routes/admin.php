<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

/**
 * ROTAS PARA ADMINS
 */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin','PreventBackhistory'])->group(function () {
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackhistory'])->group(function () {
        Route::view('/home', 'dashboard.admin.home')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});
