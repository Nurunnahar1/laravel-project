<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
   function index(){
    $faqs = Faq::get();
    return view('frontend.pages.faq',compact('faqs'));
   }
}
