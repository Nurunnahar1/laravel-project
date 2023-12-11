<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    function editPage(){
        $about = About::where('id',1)->first();
        return view('backend.page.about.edit',compact('about'));
    }
    function update(Request $request, $id)
    {

        $request->validate([
            'heading' => 'required|string',
            'text' => 'required|string',
            'designation' => 'required|string',
            'name' => "required|string",
            'image' => "nullable|image|max:1024",
            'signature_image' => "nullable|image|max:1024",
            'about_image' => "nullable|image|max:1024",

        ]);
        $about = About::where('id', $id)->first();

        // =====image=====
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpg,jpeg,png,gif,webp',
            ]);
            unlink(public_path('uploads/about/image' . $about->image));
            $ext = $request->file('image')->extension();
            $final_name = time() . '.' . $ext;
            $request->file('image')->move(public_path('uploads/about/image'), $final_name);
            $about->image = $final_name;
        }

        // =====signature_image=====
        if ($request->hasFile('signature_image')) {
            $request->validate([
                'signature_image' => 'image|mimes:jpg,jpeg,png,gif,webp',
            ]);
            unlink(public_path('uploads/about/signature_image' . $about->signature_image));
            $ext = $request->file('signature_image')->extension();
            $final_name = time() . '.' . $ext;
            $request->file('signature_image')->move(public_path('uploads/about/signature_image'), $final_name);
            $about->signature_image = $final_name;
        }

        // =====about_image=====
        if ($request->hasFile('about_image')) {
            $request->validate([
                'about_image' => 'image|mimes:jpg,jpeg,png,gif,webp',
            ]);
            unlink(public_path('uploads/about/about_image' . $about->about_image));
            $ext = $request->file('about_image')->extension();
            $final_name = time() . '.' . $ext;
            $request->file('about_image')->move(public_path('uploads/about/about_image'), $final_name);
            $about->about_image = $final_name;
        }

        $about->heading = $request->heading;
        $about->text = $request->text;
        $about->name = $request->name;
        $about->designation = $request->designation;

        // Update image properties before calling update
        $about->update();

        toastr()->success('About data updated successfully');
        return redirect()->route('about.editPage');
    }

}
