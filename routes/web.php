<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/register',[AuthController::class, 'ShowRegisterForms'])->name('registerForms');
Route::post('/register',[AuthController::class, 'Register'])->name('register');

Route::get('/login',[AuthController::class, 'ShowLoginForms'])->name('loginForms');
Route::post('/login',[AuthController::class, 'Login'])->name('login');

Route::post('/logout', [AuthController::class,'Logout'])->name('logout');
Route::get('/dashboard', [UserController::class, 'DashBoard'])->middleware('auth')->name('user.dashboard');

Route::get('/orders', [OrderController::class, 'index'])->middleware('auth')->name('client.orders');
