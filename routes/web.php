<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('books', BookController::class);
    Route::resource('classifications', ClassificationController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('purchases', PurchaseController::class);
});
Route::resource('books', BookController::class);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
});
