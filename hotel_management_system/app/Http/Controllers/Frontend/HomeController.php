<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Slide;
use App\Models\Feature;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function index(){
        $slides = Slide::get();
        $features = Feature::get();
        $testimonials = Testimonial::get();
        $posts = Post::get();
        return view('frontend.home',compact('slides','features','testimonials','posts'));
    }
}
