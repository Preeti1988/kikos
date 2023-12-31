<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('forget-password', [UserController::class, 'forgetpassword']);
Route::post('verify-otp', [UserController::class, 'verifyotp']);
Route::post('change-password', [UserController::class, 'change_password']);
Route::get('home', [UserController::class, 'home']);
Route::post('tour-detail', [UserController::class, 'tour_detail']);
Route::post('callback-request', [UserController::class, 'callback_request']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [UserController::class, 'userDetails']);
    Route::get('profiles', [UserController::class, 'userDetailss']);
    Route::post('update-profile', [UserController::class, 'updateProfile']);
    Route::post('booking-tour', [UserController::class, 'bookingTour']);
    
    
});