<?php

use App\Http\Controllers\Frontend\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Backend\TermController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\FeatureController;
use App\Http\Controllers\Backend\PrivacyController;
use App\Http\Controllers\Backend\AmenitiesController;
use App\Http\Controllers\Backend\adminSlideController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\CustomerProfileController;
use App\Http\Controllers\Frontend\FaqController as FrontendFaqController;
use App\Http\Controllers\Frontend\RoomController as FrontendRoomController;
use App\Http\Controllers\Frontend\TermController as FrontentTermController;
use App\Http\Controllers\Frontend\AboutController as FrontndAboutController;
use \App\Http\Controllers\Frontend\PhotoController as FrontendPhotoController;
use \App\Http\Controllers\Frontend\VideoController as FrontendVideoController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\PrivacyController as FrontendPrivacyController;
use App\Http\Controllers\Frontend\SubscriberController as FrontendSubscriberController;


//============ frontend routes===========
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/blog/{id}',[BlogController::class,'singleBlog'])->name('single.blog');
Route::get('/photo-gallery',[FrontendPhotoController::class,'index'])->name('photo.gallery');
Route::get('/video-gallery',[FrontendVideoController::class,'index'])->name('video.gallery');
Route::get('/faq',[FrontendFaqController::class,'index'])->name('faq');
Route::get('/about',[FrontndAboutController::class,'index'])->name('about');
Route::get('/term',[FrontentTermController::class,'index'])->name('term');
Route::get('/privacy',[FrontendPrivacyController::class,'index'])->name('privacy');
Route::get('/contact',[FrontendContactController::class,'index'])->name('contact');
Route::post('/contact-send-email',[FrontendContactController::class,'sendEmail'])->name('contact.sendEmail');
Route::post('/subscriber-send-email',[FrontendSubscriberController::class,'sendEmail'])->name('subscriber.sendEmail');
Route::get('/subscriber-verify/{email}/{token}',[FrontendSubscriberController::class,'verify'])->name('subscriber.verify');
Route::get('/room',[FrontendRoomController::class,'index'])->name('room');
Route::get('/room-details/{id}',[FrontendRoomController::class,'roomDetails'])->name('room.details');







//customer routes=================================
 Route::get('/customer-logout',[CustomerAuthController::class,'logout'])->name('customer.logout');
 Route::get('/customer-login',[CustomerAuthController::class,'loginPage'])->name('CustomerloginPage');
 Route::post('/customer-login',[CustomerAuthController::class,'login'])->name('customer.login');
 Route::get('/customer-signup',[CustomerAuthController::class,'signup'])->name('customer.signup');
 Route::post('/customer-signup',[CustomerAuthController::class,'signupMethod'])->name('customer.signupMethod');
 Route::get('/customer-verify/{email}/{token}',[CustomerAuthController::class,'customerVerify'])->name('customer.verify');
 Route::get('/customer-forget-password',[CustomerAuthController::class,'forgetPassPage'])->name('customer.forgetPassPage');
 Route::post('/customer-forget-password',[CustomerAuthController::class,'forgetPass'])->name('customer.forget.password');
 Route::get('/customer-reset-password/{email}/{token}',[CustomerAuthController::class,'resetPassPage'])->name('customer.reset.passwordPage');
 Route::post('/customer-reset-password',[CustomerAuthController::class,'resetPass'])->name('customer.reset.password');
 Route::post('/booking',[BookingController::class,'cartMethod'])->name('cartMethod');
 Route::get('/booking',[BookingController::class,'cartPage'])->name('cartPage');





Route::group(['middleware' => ['customer:customer']], function () {
    Route::get('/customer-home',[CustomerHomeController::class,'index'])->name('customer.home');

    Route::get('/customer-edit-profile',[CustomerProfileController::class,'profile'])->name('customer.profile');
    Route::post('/customer-edit-profile',[CustomerProfileController::class,'profileMethod'])->name('customer.profileMethod');


});




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

    Route::group(['middleware' => ['admin:admin']], function () {
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
         Route::controller(VideoController::class)->group(function () {
                      Route::get('video', 'index')->name('video.page');
                      Route::get('video-create', 'create')->name('video.createPage');
                      Route::post('video-store', 'store')->name('video.store');
                      Route::get('video-edit/{id}', 'editPage')->name('video.editPage');
                      Route::post('video-update/{id}', 'update')->name('video.update');
                      Route::get('video-destroy/{id}', 'destroy')->name('video.destroy');
         });
         Route::controller(FaqController::class)->group(function () {
                      Route::get('faq', 'index')->name('faq.page');
                      Route::get('faq-create', 'create')->name('faq.createPage');
                      Route::post('faq-store', 'store')->name('faq.store');
                      Route::get('faq-edit/{id}', 'editPage')->name('faq.editPage');
                      Route::post('faq-update/{id}', 'update')->name('faq.update');
                      Route::get('faq-destroy/{id}', 'destroy')->name('faq.destroy');
         });

         Route::controller(AboutController::class)->group(function () {
                      Route::get('about-edit', 'editPage')->name('about.editPage');
                      Route::post('about-update', 'update')->name('about.update');
         });
         Route::controller(TermController::class)->group(function () {
                      Route::get('term-edit', 'editPage')->name('term.editPage');
                      Route::post('term-update', 'update')->name('term.update');
         });
        Route::controller(PrivacyController::class)->group(function () {
                      Route::get('privacy-edit', 'editPage')->name('privacy.editPage');
                      Route::post('privacy-update', 'update')->name('privacy.update');
        });
        Route::controller(ContactController::class)->group(function () {
                      Route::get('contact-edit', 'editPage')->name('contact.editPage');
                      Route::post('contact-update', 'update')->name('contact.update');
        });
        Route::controller(SubscriberController::class)->group(function () {
                      Route::get('subscriber-show','showSubscriber')->name('subscriber.show');
                      Route::get('subscriber-send-email','sendEmailSubscriber')->name('subscriber.sendEmail');
                      Route::post('subscriber-send-email-submit','sendEmailSubmit')->name('submit.sendEmail');
        });
        Route::controller(AmenitiesController::class)->group(function () {
                      Route::get('amenities', 'index')->name('amenities.page');
                      Route::get('amenities-create', 'create')->name('amenities.createPage');
                      Route::post('amenities-store', 'store')->name('amenities.store');
                      Route::get('amenities-edit/{id}', 'editPage')->name('amenities.editPage');
                      Route::post('amenities-update/{id}', 'update')->name('amenities.update');
                      Route::get('amenities-destroy/{id}', 'destroy')->name('amenities.destroy');
        });
        Route::controller(RoomController::class)->group(function () {
                      Route::get('room', 'index')->name('room.page');
                      Route::get('room-create', 'create')->name('room.createPage');
                      Route::post('room-store', 'store')->name('room.store');
                      Route::get('room-edit/{id}', 'editPage')->name('room.editPage');
                      Route::post('room-update/{id}', 'update')->name('room.update');
                      Route::get('room-destroy/{id}', 'destroy')->name('room.destroy');

                      //room photo gallery route
                      Route::get('room-gallery/{id}', 'roomPhotoGalleryPage')->name('roomPhotoGallery.Page');
                      Route::post('room-gallery-store/{id}', 'roomPhotoGallerystore')->name('roomPhotoGallery.store');
                      Route::get('room-gallery-delete/{id}', 'roomPhotoGalleryDelete')->name('roomPhotoGallery.delete');
        });




     });


});
