<?php

use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin/')->group(function(){
    Route::controller(AdminController::class)->group(function () {
        Route::get('login', 'loginPage')->name('loginPage');
        Route::post('login', 'login')->name('admin.login');
    });

});
