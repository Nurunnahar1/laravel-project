<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    function editPage(){
        $about = About::where('id',1)->first();
        return view('backend.pages.about.edit',compact('about'));
    }
    function update(Request $request){
        $about = About::where('id',1)->first();
        $about->heading = $request->heading;
        $about->content = $request->content;
        $about->update();
        return redirect()->route('about.editPage')->with('success','About data updated successfully');
    }
}
