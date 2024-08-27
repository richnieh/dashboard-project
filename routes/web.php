<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomLoginController;

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('/posts', [PostController::class,'index'])->name('admin.posts.index');
});

Auth::routes();

Route::controller(HomeController::class)->group(function(){
    Route::get('/home','index')->name('home');
    Route::get('/post/{post:slug}', 'post')->name('home.post');
    Route::get('/about','about')->name('home.about');
    Route::get('/contact','contact')->name('home.contact');
});

Route::controller(CustomLoginController::class)->group(function(){
    Route::get('custom-login', 'customShowLoginForm')->name('custom.login');
    Route::post('custom-logout', 'customLogout')->name('custom.logout');
    Route::post('custom-login', 'customLogin')->name('custom.login.post');
    Route::get('custom-show-link-form', 'customShowLink')->name('custom.link.request');
    Route::post('custom-reset', 'customReset')->name('custom.reset');
    Route::get('custom-password/reset/{token}', 'customShowResetForm')->name('custom.show.reset');
    Route::post('custom-password/reset', 'customPasswordUpdate')->name('custom.update');
});


