<?php

use App\Http\Controllers\fronend\PostController;
use App\Http\Controllers\fronend\PostImageController;
use App\Http\Controllers\fronend\ProfileController;
use App\Http\Controllers\fronend\UserController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.auth.register');
});


Route::get('register',[UserController::class,'register'])->name('register');
Route::post('register',[UserController::class,'registersave'])->name('register');

Route::get('login',[UserController::class,'login'])->name('login');
Route::post('login',[UserController::class,'loginmatch'])->name('login');
Route::get('user/verify/{token}', [UserController::class, 'verifyUser']);

Route::get('forgot-password/email', [UserController::class, 'showForgetPasswordForm'])->name('user.mail.page');
Route::post('send-user-mail', [UserController::class, 'sendMailForForgotPassword'])->name('send.mail.verify');
Route::get('forgot-password/{token}', [UserController::class, 'forgotPassword']);
Route::post('update-password', [UserController::class, 'newPassword'])->name('change.password');

Route::get('logout',[UserController::class,'logout'])->name('logout');

Route::middleware(Authenticate::class)->group(function(){
    Route::resource('profile',ProfileController::class);
    Route::resource('post',PostController::class);
    // Route::resource('image_post',PostImageController::class);
});