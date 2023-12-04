<?php

namespace App\Http\Controllers\Backend;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    function index(){
        $photos = Photo::latest()->paginate(10);
        return view('backend.pages.photo.index',compact('photos'));
    }


    function create(){

        return view('backend.pages.photo.create' );
    }
    function store(Request $request){

        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif|max:1024'

        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/photo_gallery'), $final_name);

        $photos = new Photo();
        $photos->photo = $final_name;
        $photos->caption = $request->caption;
        $photos->save();

        return redirect()->route('photo.page')->with('success', 'Photo data create successfully');
    }

    function editPage($id){
        $photos = Photo::where('id', $id)->first();
        return view('backend.pages.photo.edit',compact('photos'));
    }

    function update(Request $request,$id){

        $photos = Photo::where('id', $id)->first();

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif|max:1024',
            ]);
            unlink(public_path('uploads/photo_gallery/'.$photos->photo));
            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/photo_gallery/'),$final_name);
            $photos->photo = $final_name;
        }

        $photos->caption = $request->caption;
        $photos->update();

        return redirect()->route('photo.page')->with('success', 'Photo is update successfully.');
    }

    function destroy($id){
        $single_data = Photo::where('id', $id)->first();
        unlink(public_path('uploads/photo_gallery/'.$single_data->photo));
        $single_data->delete();
        return redirect()->route('photo.page')->with('success', 'Photo is Deleted successfully.');
    }

}
