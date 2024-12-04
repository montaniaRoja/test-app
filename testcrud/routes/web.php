<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;

Route::view('/', 'welcome')->name('welcome');
Route::get('/index',[CustomerController::class,'index'])->name('index');

Route::post('/user/login', [AuthController::class, 'loginUser'])->name('user.login');
Route::get('/user/logout', [AuthController::class, 'userLogout'])->name('user.logout');

Route::post('/customer/store',[CustomerController::class,'store'])->name('customer.store');