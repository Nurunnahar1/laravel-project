<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
   public function index(){
    $photos = Photo::paginate(9);
    return view('frontend.pages.photo_gallery',compact('photos'));
   }
}
