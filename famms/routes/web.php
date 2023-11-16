<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
// Route::get('/redirect', function () {
//     return view('frontend.layout.app');
// });
Route::get('/redirect', [HomeController::class,'redirect']);

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::controller(CategoryController::class)->group(function () {
    Route::get('/category-list','CategoryList')->name('category.list');
    Route::get('/category-create', 'CategoryCreate')->name('category.create');
    Route::post('/category-store', 'CategoryStore')->name('category.store');
    Route::get('/category-edit/{slug}','CategoryEdit')->name('category.edit');
    Route::post('/category-update/{slug}','CategoryUpdate')->name('category.update');
    Route::get('/category-destroy/{slug}','CategoryDestroy')->name('category.destroy');

});
