<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenAuthenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;



// Home Page
Route::get('/', [HomeController::class, 'HomePage']);
Route::get('/by-category', [CategoryController::class, 'ByCategoryPage']);
Route::get('/by-brand', [BrandController::class, 'ByBrandPage']);
Route::get('/policy', [PolicyController::class, 'PolicyPage']);
Route::get('/details', [ProductController::class, 'Details']);
Route::get('/login', [UserController::class, 'LoginPage']);
Route::get('/verify', [UserController::class, 'VerifyPage']);
Route::get('/wish', [ProductController::class, 'WishList']);






//backend methods



//Brand List
Route::get('/BrandList', [BrandController::class,'BrandList'])->middleware([TokenAuthenticate::class]);
//category List
Route::get('/CategoryList', [CategoryController::class,'CategoryList']);

//Product List
Route::get('/ListProductByCategory/{id}', [ProductController::class,'ListProductByCategory']);
Route::get('/ListProductByBrand/{id}', [ProductController::class,'ListProductByBrand']);
Route::get('/ListProductByRemark/{remark}', [ProductController::class,'ListProductByRemark']);
//Slider
Route::get('/ListProductSlider', [ProductController::class,'ListProductSlider']);
//product Details
Route::get('/ProductDetailsById/{id}', [ProductController::class,'ProductDetailsById']);
Route::get('/ListReviewByProduct/{product_id}', [ProductController::class,'ListReviewByProduct']);




//user Auth
Route::get('/user-login/{UserEmail}', [UserController::class,'UserLogin']);
Route::get('/VerifyLogin/{UserEmail}/{OTP}', [UserController::class,'VerifyLogin']);
Route::get('/logout', [UserController::class,'UserLogout']);

//user profile
Route::post('/CreateProfile', [ProfileController::class,'CreateProfile'])->middleware([TokenAuthenticate::class]);
Route::get('/ReadProfile', [ProfileController::class,'ReadProfile'])->middleware([TokenAuthenticate::class]);

//product Review
Route::get('/CreateProductReview', [ProductController::class,'CreateProductReview'])->middleware([TokenAuthenticate::class]);

//product wish list
Route::get('/ProductWishList', [ProductController::class,'ProductWishList'])->middleware([TokenAuthenticate::class]);
Route::get('/CreateWishList/{product_id}', [ProductController::class,'CreateWishList'])->middleware([TokenAuthenticate::class]);
Route::get('/RemoveWishList/{product_id}', [ProductController::class,'RemoveWishList'])->middleware([TokenAuthenticate::class]);



//product Cart list
Route::get('/CartList', [ProductController::class,'CartList'])->middleware([TokenAuthenticate::class]);
Route::post('/CreateCartList', [ProductController::class,'CreateCartList'])->middleware([TokenAuthenticate::class]);
Route::get('/DeleteCartList/{product_id}', [ProductController::class,'DeleteCartList'])->middleware([TokenAuthenticate::class]);



//Invoice and payment
Route::get('/invoice-create', [InvoiceController::class,'InvoiceCreate'])->middleware([TokenAuthenticate::class]);
Route::get('/incoice-list/{product_id}', [InvoiceController::class,'InvoiceList'])->middleware([TokenAuthenticate::class]);
Route::get('/invoice-product-list/{product_id}', [InvoiceController::class,'InvoiceProductList'])->middleware([TokenAuthenticate::class]);



// payment
Route::post('/payment-success', [InvoiceController::class,'PaymentSuccess']);
Route::post('/payment-calcel', [InvoiceController::class,'PaymentCancel']);
Route::post('/payment-fail', [InvoiceController::class,'PaymentFail']);


//backend methods


//frontend methods


Route::get('/CategoryList', [CategoryController::class, 'CategoryList']);

// Brand List
Route::get('/BrandList', [BrandController::class, 'BrandList']);

// Product List
Route::get('/ListProductByCategory/{id}', [ProductController::class, 'ListProductByCategory']);
Route::get('/ListProductByBrand/{id}', [ProductController::class, 'ListProductByBrand']);
Route::get('/ListProductByRemark/{remark}', [ProductController::class, 'ListProductByRemark']);
// Slider
Route::get('/ListProductSlider', [ProductController::class, 'ListProductSlider']);
// Product Details
Route::get('/ProductDetailsById/{id}', [ProductController::class, 'ProductDetailsById']);
Route::get('/ListReviewByProduct/{product_id}', [ProductController::class, 'ListReviewByProduct']);
//policy
Route::get("/PolicyByType/{type}",[PolicyController::class,'PolicyByType']);





//frontend methods
