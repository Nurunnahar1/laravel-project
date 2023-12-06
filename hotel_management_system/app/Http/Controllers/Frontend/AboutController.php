<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    function index(){
        $about = About::where('id',1)->first();
        return view('frontend.pages.about',compact('about'));
    }
}
