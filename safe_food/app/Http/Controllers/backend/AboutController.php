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


        ]);
        $about = About::where('id', $id)->first();

        // =====image=====
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
            ]);
            unlink(public_path('uploads/about/image/' . $about->image));
            $ext = $request->file('image')->extension();
            $final_name = time() . '.' . $ext;
            $request->file('image')->move(public_path('uploads/about/image'), $final_name);
            $about->image = $final_name;
        }

           // =====signature image=====
            if ($request->hasFile('signature')) {
                $request->validate([
                    'signature' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
                ]);
                unlink(public_path('uploads/about/signature/' . $about->signature));
                $ext = $request->file('signature')->extension();
                $sfinal_name = time() . '.' . $ext;
                $request->file('signature')->move(public_path('uploads/about/signature'), $sfinal_name);
                $about->signature = $sfinal_name;
            }

            // =====about image=====
            if ($request->hasFile('about_image')) {
                $request->validate([
                    'about_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
                ]);
                unlink(public_path('uploads/about/about/' . $about->about_image));
                $ext = $request->file('about_image')->extension();
                $afinal_name = time() . '.' . $ext;
                $request->file('about_image')->move(public_path('uploads/about/about'), $afinal_name);
                $about->about_image = $afinal_name;
            }

        $about->heading = $request->heading;
        $about->text = $request->text;
        $about->name = $request->name;
        $about->designation = $request->designation;
        $about->update();

        toastr()->success('About data updated successfully');
        return redirect()->route('about.editPage');
    }

}
