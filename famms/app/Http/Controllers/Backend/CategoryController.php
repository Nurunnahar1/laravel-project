<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StorecategoryRequest;

class CategoryController extends Controller
{
   function CategoryList(){
    $categories = Category::latest()->paginate(10);
    return view("backend.pages.category.list", compact("categories"));
   }

   function CategoryCreate(){
    return view("backend.pages.category.create");
   }


   function CategoryStore(StorecategoryRequest $request){
        $category = Category::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        ]);
        $this->image_upload($request, $category->id);

        Session::flash('msg','Category created successfully');
        return redirect()->route('category.list');
    }


    function image_upload($request, $item_id){
        $category = Category::findorFail($item_id);

        if($request->hasFile('category_image')){
            // dd($request->all());
            if($category->category_image !='default-image.jpg'){
                $photo_location = 'public/uploads/category/';
                $old_photo_location = $photo_location.$category->category_image;
                unlink(base_path($old_photo_location));

            }
            $photo_location = 'public/uploads/category/';
            $uploaded_photo = $request->file('category_image');
            $new_photo_name = $category->id.'.'.$uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_location.$new_photo_name;
            Image::make($uploaded_photo)->resize(105,105)->save(base_path($new_photo_location),40);
            $check = $category->update([
                'category_image' => $new_photo_name,
            ]);
        }
    }


}

