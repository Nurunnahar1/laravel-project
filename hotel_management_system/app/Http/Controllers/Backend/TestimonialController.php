<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    function index(){
        $testimonials = Testimonial::latest()->paginate(10);
        return view('backend.pages.testimonial.index',compact('testimonials'));
    }
    function create(){

        return view('backend.pages.testimonial.create' );
    }
    function store(Request $request){

        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required'

        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/testimonial'), $final_name);

        $slide_data = new Testimonial();
        $slide_data->photo = $final_name;

        $slide_data->name = $request->name;
        $slide_data->designation = $request->designation;
        $slide_data->comment = $request->comment;
        $slide_data->save();

        return redirect()->route('testimonial.page')->with('success', 'Testtimonial data create successfully');
    }

    function editPage($id){
        $testimonials = Testimonial::where('id', $id)->first();
        return view('backend.pages.testimonial.edit',compact('testimonials'));
    }

    function update(Request $request,$id){

        $slide_data = Testimonial::where('id', $id)->first();

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            unlink(public_path('uploads/testimonial/'.$slide_data->photo));
            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/testimonial/'),$final_name);
            $slide_data->photo = $final_name;
        }

        $slide_data->name = $request->name;
        $slide_data->designation = $request->designation;
        $slide_data->comment = $request->comment;
        $slide_data->update();

        return redirect()->route('testimonial.page')->with('success', 'Testtimonial data update successfully');
    }

    function destroy($id){
        $single_data = Testimonial::where('id', $id)->first();
        unlink(public_path('uploads/testimonial/'.$single_data->photo));
        $single_data->delete();
        return redirect()->route('testimonial.page')->with('success', 'Testimonial is Deleted successfully.');
    }
}
