<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get('/', function () {
        return view('welcome');
    });

    Route::post('/UserLogin', [UserController::class, 'UserLogin']);
    Route::post('/UserRegistration', [UserController::class, 'UserRegistration']);
    Route::post('/SendOTPToEmail', [UserController::class, 'SendOTPToEmail']);
    Route::post('/OTPVerify', [UserController::class, 'OTPVerify']);
    Route::post('/SetPaeeword', [UserController::class, 'SetPaeeword']);
    Route::post('/ProfileUpdate', [UserController::class, 'ProfileUpdate']);

