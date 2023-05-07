<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClassificationController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\PurchaseController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Public routes
//Route::post('/register', [AuthController::class, 'register']);
//Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {

});

//Route::group([
//    'middleware' => 'api',
//    'prefix' => 'auth'
//], function ($router) {
//    Route::post('/login', [AuthController::class, 'login']);
//    Route::post('/register', [AuthController::class, 'register']);
//    Route::post('/logout', [AuthController::class, 'logout']);
//    Route::post('/refresh', [AuthController::class, 'refresh']);
//    Route::get('/user-profile', [AuthController::class, 'userProfile']);
//});
Route::resource('books', BookController::class);
Route::resource('classifications', ClassificationController::class);
Route::resource('customers', CustomerController::class);
Route::resource('purchases', PurchaseController::class);

Route::fallback(function () {
    return response()->json(['message' => 'Not Found.'], 404);
});
