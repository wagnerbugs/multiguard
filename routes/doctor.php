<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Doctor\DoctorController;

 /**
  * ROTAS PARA ADMINS
  */
 Route::prefix('doctor')->name('doctor.')->group(function () {
     Route::middleware(['guest:doctor','PreventBackhistory'])->group(function () {
         Route::view('/login', 'dashboard.doctor.login')->name('login');
         Route::view('/register', 'dashboard.doctor.register')->name('register');
         Route::post('/create', [DoctorController::class, 'create'])->name('create');
         Route::post('/check', [DoctorController::class, 'check'])->name('check');
     });
     Route::middleware(['auth:doctor','PreventBackhistory'])->group(function () {
         Route::view('/home', 'dashboard.doctor.home')->name('home');
         Route::post('/logout', [DoctorController::class, 'logout'])->name('logout');
     });
 });
