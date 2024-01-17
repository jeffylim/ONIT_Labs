<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UnauthController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/login', [UnauthController::class, 'login'])->name('auth.login');

Route::middleware('guest')->group(function (){
    Route::view('/registration', 'auth.registration')->name('auth.registration');
    Route::post('/registration_do', [UnauthController::class, 'registration_do'])->name('auth.registration_do');
});

Route::middleware('auth')->group(function (){
    Route::view('/profile', 'auth.profile')->name('auth.profile');
    Route::post('/profile_update', [AuthController::class, 'profile_update'])->name('auth.profile_update');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::view('/registration_done', 'auth.registration_done')->name('auth.registration.done');

