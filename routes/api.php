<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::controller(AuthController::class)->group(function () {
//     Route::get('/login', 'showLogin')->name('login');
//     Route::post('/login', 'login')->name('login.user');
//     Route::get('/registration', 'showRegistration')->name('registration');
//     Route::post('/registration', 'Registration')->name('create.user');
//     Route::post('/get-country', 'getCountry')->name('get-country');
//     // Route::get('auth/google', 'redirect')->name('google.auth');
//     // Route::get('auth/google/call-back', 'callback');
//     // Route::get('auth/google/login/type', 'redirectLogin')->name('google.auth_login');
// });