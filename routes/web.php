<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('/posts', [PostController::class,'index'])->name('admin.posts.index');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
