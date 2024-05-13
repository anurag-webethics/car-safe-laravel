<?php
#/ sweetalert
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthLogin;
use App\Http\Middleware\AuthAdmin;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::middleware('active.user')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'showLogin')->name('login');
        Route::post('/login', 'login')->name('login.user');
        Route::get('/registration', 'showRegistration')->name('registration');
        Route::post('/registration', 'Registration')->name('create.user');
        Route::get('auth/google', 'redirect')->name('google.auth');
        Route::get('auth/google/call-back', 'callback');
        Route::get('auth/google/login/type', 'redirectLogin')->name('google.auth_login');
    });
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile');
        Route::get('/profile/update', 'edit')->name('profile.edit');
        Route::post('/profile/update/${id}', 'update')->name('profile.update');
    });

    Route::controller(AlbumController::class)->group(function () {
        Route::get('/album/add', 'showAlbum')->name('album');
        Route::post('/album/add', 'album')->name('user.album');
        Route::get('/album/view', 'show')->name('album.gallery');
    });

    Route::controller(ImagesController::class)->group(function () {
        Route::get('/images/{id}/view', 'show')->name('image.gallery');
        Route::get('/image/{id}/add', 'showImage')->name('image');
        Route::post('/image', 'image')->name('user.image');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
});

Route::middleware('admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/admin', 'showAdmin')->name('admin');
    });
});

Route::middleware('super.admin')->group(function () {
    Route::controller(SuperAdminController::class)->group(function () {
        Route::get('/super-admin', 'view')->name('role');
        Route::post('/super-admin', 'create')->name('add.role');
        Route::get('/edit/user-role/{id}', 'editUser')->name('update.role');
        Route::post('/edit/user-role/{id}', 'update')->name('edit.user_role');
        Route::get('/super-admin/{id}', 'destroy')->name('delete.user_role');
    });

    Route::controller(SearchController::class)->group(function () {
        Route::get('/search-data', 'searchData')->name('search.data');
        Route::get('/search', 'search')->name('search');
    });
});

Route::get('/forget', function () {
    return view('auth.forget-password');
})->name('forget');

Route::get('/admin-permission', [UserController::class, 'permission']);
Route::get('/admin-users', [PermissionController::class, 'index']);

Route::fallback(function () {
    return 'This page is not found';
});