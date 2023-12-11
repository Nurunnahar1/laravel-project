<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\Backend\SubCategoryController;

// frontend
Route::get('/', [HomeController::class, 'index']);


Route::prefix('admin/')->middleware(['auth'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('logout', 'adminLogout')->name('admin.logout');

    });

    // CATEGORY
    Route::resource('category', CategoryController::class);

    // sub CATEGORY
    Route::resource('sub-category', SubCategoryController::class);
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'loadSubcategory']);

    // product
    Route::resource('product', ProductController::class);

    Route::controller(ProductController::class)->group(function () {
        Route::post('/update/thambnail', 'UpdateThambnail')->name('update.thambnail');
        Route::post('/update/multiimage', 'UpdateMultiimage')->name('update.multiimage');
        Route::get('/multiimg/delete/{id}', 'MulitImageDelelte')->name('multiimg.delete');
    });

    // slider
    Route::resource('slider', SliderController::class);
    // service
    Route::resource('service', ServiceController::class);

    Route::controller(AboutController::class)->group(function () {
        Route::get('about-edit', 'editPage')->name('about.editPage');
        Route::post('about-update/{id}', 'update')->name('about.update');
    });



});


require __DIR__ . '/auth.php';
