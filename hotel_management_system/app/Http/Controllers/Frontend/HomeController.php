<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $slides = Slide::get();
        $features = Feature::get();
        return view('frontend.home',compact('slides','features'));
    }
}
