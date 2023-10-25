<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

Route::post('/payment-ipn', [InvoiceController::class,'PaymentIPN']);
