<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;



Route::get('/', function () {
    return view('backend.layout.app');
});

Route::prefix('admin/')->group(function(){
    Route::controller(AdminController::class)->group(function () {
        Route::get('login', 'loginPage')->name('loginPage');
        Route::post('login', 'login')->name('admin.login');
        Route::get('logout', 'logout')->name('admin.logout');
        Route::get('forget-password', 'forgetPassPage')->name('forget.passwordPage');
        Route::post('forget-password', 'forgetPass')->name('admin.forget.password');
        Route::get('reset-password/{token}/{email}', 'resetPassPage')->name('reset.passwordPage');
        Route::post('reset-password', 'resetPass')->name('admin.reset.password');
        Route::get('dashboard', 'dashboard')->name('dashboard');

    });


    Route::controller(AdminProfileController::class)->group(function () {

        Route::get('profile', 'profilePage')->name('admin.profilePage');
        Route::post('profile', 'adminProfile')->name('admin.profile');
    });

});
