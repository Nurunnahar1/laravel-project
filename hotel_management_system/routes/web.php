<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;


Route::get('/', function () {
    return view('admin.layout.app');
});
Route::prefix('admin/')->group(function(){
    Route::get('login',[LoginController::class, 'loginPage'])->name('admin.loginpage');
    Route::post('login',[LoginController::class, 'login'])->name('admin.login');
    Route::get('logout',[LoginController::class, 'logout'])->name('admin.logout');
    Route::get('forgrt-password',[LoginController::class, 'forgetPasswordPage'])->name('forget.password.page');
    Route::post('forgrt-password',[LoginController::class, 'forgetPassword'])->name('forget.password');

    Route::get('dashboard',[HomeController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');









});
