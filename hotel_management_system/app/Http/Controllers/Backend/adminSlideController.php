<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class adminSlideController extends Controller
{
    function index(){
        $slide_data = Slide::latest()->paginate(10);
        return view('backend.pages.slide.index',compact('slide_data'));
    }
    function create(){

        return view('backend.pages.slide.create' );
    }
}
