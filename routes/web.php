<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/register',[AuthController::class, 'ShowRegisterForms'])->name('client.registerForms');
Route::post('/register',[AuthController::class, 'Register'])->name('client.register');

Route::get('/login',[AuthController::class, 'ShowLoginForms'])->name('user.loginForms');
Route::post('/login',[AuthController::class, 'Login'])->name('user.login');

Route::post('/logout', [AuthController::class,'Logout'])->name('user.logout');
