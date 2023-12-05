<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    function index(){
        $videos = Video::latest()->paginate(10);
        return view('backend.pages.video.index',compact('videos'));
    }
    function create(){
        return view('backend.pages.video.create' );
    }

    function store(Request $request){

        $request->validate([
            'video_id' => 'required'
        ]);
        $videos = new Video();
        $videos->video_id = $request->video_id;
        $videos->caption = $request->caption;
        $videos->save();

        return redirect()->route('video.page')->with('success', 'Video data create successfully');
    }

    function editPage($id){
        $videos = Video::where('id', $id)->first();
        return view('backend.pages.photo.edit',compact('videos'));
    }

    function update(Request $request,$id){
        $videos = Video::where('id', $id)->first();
        $request->validate([
            'video_id' => 'required'
        ]);
        $videos->video_id = $request->video_id;
        $videos->caption = $request->caption;
        $videos->update();
        return redirect()->route('video.page')->with('success', 'Video is update successfully.');
    }
    function destroy($id){
        $single_data = Video::where('id', $id)->first();
        $single_data->delete();
        return redirect()->route('video.page')->with('success', 'Video is Deleted successfully.');
    }

}





