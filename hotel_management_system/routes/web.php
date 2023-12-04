<?php

use App\Http\Controllers\Backend\PhotoController;
use \App\Http\Controllers\Frontend\PhotoController as FrontendPhotoController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Frontend\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\FeatureController;
use App\Http\Controllers\Backend\adminSlideController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\AdminProfileController;


//============ frontend routes===========
// Route::get('/', function () {
//     return view('frontend.layout.app');
// });
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/blog/{id}',[BlogController::class,'singleBlog'])->name('single.blog');
Route::get('/photo-gallery',[FrontendPhotoController::class,'index'])->name('photo.gallery');


//=============Backend routes========
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

    Route::controller(adminSlideController::class)->group(function () {

        Route::get('slide', 'index')->name('slide.page');
        Route::get('slide-create', 'create')->name('slide.createPage');
        Route::post('slide-store', 'store')->name('slide.store');
        Route::get('slide-edit/{id}', 'editPage')->name('slide.editPage');
        Route::post('slide-update/{id}', 'update')->name('slide.update');
        Route::get('slide-destroy/{id}', 'destroy')->name('slide.destroy');
    });
    Route::controller(FeatureController::class)->group(function () {
        Route::get('feature', 'index')->name('feature.page');
        Route::get('feature-create', 'create')->name('feature.createPage');
        Route::post('feature-store', 'store')->name('feature.store');
        Route::get('feature-edit/{id}', 'editPage')->name('feature.editPage');
        Route::post('feature-update/{id}', 'update')->name('feature.update');
        Route::get('feature-destroy/{id}', 'destroy')->name('feature.destroy');
    });
    Route::controller(TestimonialController::class)->group(function () {
        Route::get('testimonial', 'index')->name('testimonial.page');
        Route::get('testimonial-create', 'create')->name('testimonial.createPage');
        Route::post('testimonial-store', 'store')->name('testimonial.store');
        Route::get('testimonial-edit/{id}', 'editPage')->name('testimonial.editPage');
        Route::post('testimonial-update/{id}', 'update')->name('testimonial.update');
        Route::get('testimonial-destroy/{id}', 'destroy')->name('testimonial.destroy');
    });
    Route::controller(PostController::class)->group(function () {
        Route::get('post', 'index')->name('post.page');
        Route::get('post-create', 'create')->name('post.createPage');
        Route::post('post-store', 'store')->name('post.store');
        Route::get('post-edit/{id}', 'editPage')->name('post.editPage');
        Route::post('post-update/{id}', 'update')->name('post.update');
        Route::get('post-destroy/{id}', 'destroy')->name('post.destroy');
    });
    Route::controller(PhotoController::class)->group(function () {
        Route::get('photo', 'index')->name('photo.page');
        Route::get('photo-create', 'create')->name('photo.createPage');
        Route::post('photo-store', 'store')->name('photo.store');
        Route::get('photo-edit/{id}', 'editPage')->name('photo.editPage');
        Route::post('photo-update/{id}', 'update')->name('photo.update');
        Route::get('photo-destroy/{id}', 'destroy')->name('photo.destroy');
    });


});
