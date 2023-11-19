<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\TestimonialController;
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
Route::controller(ProductController::class)->group(function () {
    Route::get('/product-list','ProductList')->name('product.list');
    Route::get('/product-create', 'ProductCreate')->name('product.create');
    Route::post('/product-store', 'ProductStore')->name('product.store');
    Route::get('/product-edit/{slug}','ProductEdit')->name('product.edit');
    Route::post('/product-update/{slug}','ProductUpdate')->name('product.update');
    Route::get('/product-destroy/{slug}','ProductDestroy')->name('product.destroy');

});
Route::controller(TestimonialController::class)->group(function () {
    Route::get('/testimonial-list','TestimonialList')->name('testimonial.list');
    Route::get('/testimonial-create', 'TestimonialCreate')->name('testimonial.create');
    Route::post('/testimonial-store', 'TestimonialStore')->name('testimonial.store');


    Route::get('/testimonial-edit/{slug}','TestimonialEdit')->name('testimonial.edit');
    Route::post('/testimonial-update/{slug}','TestimonialUpdate')->name('testimonial.update');
    Route::get('/testimonial-destroy/{slug}','TestimonialDestroy')->name('testimonial.destroy');
});
Route::controller(CouponController::class)->group(function () {
    Route::get('/coupon-list','CouponList')->name('coupon.list');
    Route::get('/coupon-create', 'CouponCreate')->name('coupon.create');
    Route::post('/coupon-store', 'CouponStore')->name('coupon.store');
    Route::get('/coupon-edit/{slug}','CouponEdit')->name('coupon.edit');
    Route::post('/coupon-update/{slug}','CouponUpdate')->name('coupon.update');
    Route::get('/coupon-destroy/{slug}','CouponDestroy')->name('coupon.destroy');
});
