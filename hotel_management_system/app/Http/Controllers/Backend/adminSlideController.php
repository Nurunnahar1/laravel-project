<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slide;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminSlideController extends Controller
{
    function index(){
        $slide_data = Slide::latest()->paginate(10);
        return view('backend.pages.slide.index',compact('slide_data'));
    }
    function create(){

        return view('backend.pages.slide.create' );
    }
    function store(Request $request){

        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif'

        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/slide'), $final_name);

        $slide_data = new Slide();
        $slide_data->photo = $final_name;

        $slide_data->heading = $request->heading;
        $slide_data->text = $request->text;
        $slide_data->button_text = $request->button_text;
        $slide_data->button_url = $request->button_url;
        $slide_data->save();

        return redirect()->route('slide.page')->with('success', 'Slide data create successfully');
    }

    function editPage($id){
        $slide_data = Slide::where('id', $id)->first();
        return view('backend.pages.slide.edit',compact('slide_data'));
    }

    function update(Request $request,$id){
        // echo $id;
        $slide_data = Slide::where('id', $id)->first();

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            unlink(public_path('uploads/slide/'.$slide_data->photo));
            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/slide/'),$final_name);
            $slide_data->photo = $final_name;
        }

        $slide_data->heading = $request->heading;
        $slide_data->text = $request->text;
        $slide_data->button_text = $request->button_text;
        $slide_data->button_url = $request->button_url;
        $slide_data->update();

        return redirect()->route('slide.page')->with('success', 'Slide is update successfully.');
    }

    function destroy($id){
        $single_data = Slide::where('id', $id)->first();
        unlink(public_path('uploads/slide/'.$single_data->photo));
        $single_data->delete();
        return redirect()->route('slide.page')->with('success', 'Slide is Deleted successfully.');
    }

}
