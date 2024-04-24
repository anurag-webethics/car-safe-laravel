<?php
#/ sweetalert
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthLogin;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login-user');
    Route::get('/registration', 'showRegistration')->name('registration');
    Route::post('/registration', 'Registration')->name('create-user');
    Route::get('auth/google', 'redirect')->name('google-auth');
    Route::get('auth/google/call-back', 'callback');
    Route::get('auth/google/login/type', 'redirectLogin')->name('google-auth-login');
    Route::get('/search-data', 'searchData')->name('searchData');
    Route::get('/search', 'search')->name('search');
    Route::get('/admin', 'admin');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('authlogin')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile');
        Route::get('/profile-edit', 'edit')->name('profile-edit');
        Route::post('/profile-update/${id}', 'update')->name('profile-update');
    });

    Route::controller(AlbumController::class)->group(function () {
        Route::get('/album', 'showAlbum')->name('album');
        Route::post('/album', 'album')->name('user-album');
        Route::get('/album-gallery', 'show')->name('album-gallery');
    });

    Route::controller(ImagesController::class)->group(function () {
        Route::get('/image-gallery/{id}', 'show')->name('image-gallery');
        Route::get('/image/{id}', 'showImage')->name('image');
        Route::post('/image', 'image')->name('user-image');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        // Route::get('/destroy', 'sweetalert')->name('sweetalert');
    });
});

Route::get('/forget', function () {
    return view('auth.forget-password');
})->name('forget');
