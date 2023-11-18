<?php

namespace App\Http\Controllers\Backend;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreTestimonialRequest;

class TestimonialController extends Controller
{
   function TestimonialList(){
     $testimonials = Testimonial::latest('id')->select(['id','client_name','client_name_slug','client_designation','client_message','client_image','updated_at'])->paginate(5);
     return view('backend.pages.testimonial.list',compact('testimonials'));
   }

   function TestimonialCreate(){
    return view('backend.pages.testimonial.create');
   }
   function TestimonialStore(StoreTestimonialRequest $request){
        $testimonial = Testimonial::create([
            'client_name' =>$request->client_name,
            'client_name_slug' =>Str::slug($request->client_name),
            'client_designation' =>$request->client_designation ,
            'client_message' => $request->client_message,

        ]);
        $this->image_upload($request,$testimonial->id);
        Session::flash('msg','Testimonial created successfully');
        return redirect()->route('testimonial.list');
   }

   function image_upload($request , $item_id){
    $testimonial = Testimonial::findorFail($item_id);

    if($request->hasFile('client_image')){
        if($testimonial->client_image != 'default_client_image.jpg'){
            $photo_location = 'public/uploads/testimonial/';
            $old_photo_location = $photo_location.$testimonial->client_image;
            unlink(base_path($old_photo_location));
        }
        $photo_location = 'public/uploads/testimonial/';
        $uploaded_photo = $request->file('client_image');
        $new_photo_name = $testimonial->id.'.'.$uploaded_photo->getClientOriginalExtension();
        $new_photo_location = $photo_location.$new_photo_name;
        Image::make($uploaded_photo)->resize(105,105)->save(base_path($new_photo_location), 40);

        $check = $testimonial->update([
            'client_image' => $new_photo_name,
        ]);
    }
   }
}
