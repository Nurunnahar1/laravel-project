<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function index(){
        $videos = Video::paginate(12);
        return view('frontend.pages.video_gallery',compact('videos'));
       }
}
