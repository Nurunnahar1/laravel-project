<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;


Route::get('/', function () {
    return view('admin.layout.app');
});
Route::prefix('admin/')->group(function(){
    Route::get('login',[HomeController::class, 'loginPage'])->name('admin.loginpage');
    Route::post('login',[HomeController::class, 'login'])->name('admin.login');
    Route::get('forgrt-password',[HomeController::class, 'forgetPasswordPage'])->name('forget.password.page');
    Route::post('forgrt-password',[HomeController::class, 'forgetPassword'])->name('forget.password');







});
