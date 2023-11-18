<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
   function TestimonialList(){
     $testimonials = Testimonial::latest('id')->select(['id','client_name','client_name_slug','client_designation','client_message','client_image','updated_at'])->paginate(5);
     return view('backend.pages.testimonial.list',compact('testimonials'));
   }

   function TestimonialCreate(){
    return view('backend.pages.testimonial.create');
   }
}
