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

Route::get('/order/{id}', [OrderController::class, 'edit'])->middleware('auth')->name('order.show');
Route::put('/order/{id}',[OrderController::class, 'update'])->middleware('auth')->name('order.update');
Route::delete('/order/{id}',[OrderController::class, 'destroy'])->middleware('auth')->name('order.destroy');



Route::get('/orders/create', [OrderController::class, 'create'])->middleware('auth')->name('order.create');

Route::post('/orders/create', [OrderController::class, 'store'])->middleware('auth')->name('order.store');



