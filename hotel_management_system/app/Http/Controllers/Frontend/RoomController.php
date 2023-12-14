<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    //   function index(){

    //   $posts = Post::orderBy('id', 'desc')->paginate(9);
    //   return view('frontend.pages.blog',compact('posts'));
    //   }
      function roomDetails($id){
      $single_room_data = Room::with('roomPhotos')->where('id', $id)->first();
      return view('frontend.pages.room_details', compact('single_room_data'));
      }
}
