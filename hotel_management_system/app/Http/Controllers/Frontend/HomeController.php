<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $slides = Slide::get();
        return view('frontend.home',compact('slides'));
    }
}
