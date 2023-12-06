<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;

class SubCategoryController extends Controller
{public function index() {
    $sub_categories = SubCategory::with('category')->get();
    return view('backend.page.sub-category.index', compact('sub_categories'));
}


public function create() {
    $allCategory = Category::all();
    return view('backend.page.sub-category.create',compact('allCategory'));
}

/**
 * Store a newly created resource in storage.
 */
public function store(StoreSubCategoryRequest $request) {

    if ($request->hasFile('image')) {

        $file = request()->file('image');
        $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension(); //for name making
        $file->move(public_path('/uploads/sub_category'), $fileName);
        $filePath = "uploads/sub_category/{$fileName}";

        SubCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $filePath,
            'category_id'=>$request->category_id
        ]);

        toastr()->success('SubCategory created with image');
        return redirect()->route('sub-category.index');
    }
    SubCategory::create([
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'category_id'=>$request->category_id
    ]);
    toastr()->success('SubCategory created without image');
    return redirect()->route('sub-category.index');

}
public function edit(string $slug) {
    $categories = Category::where('slug', $slug)->first();

    return view('backend.page.sub-category.edit', compact('categories'));

}

/**
 * Update the specified resource in storage.
 */
public function update(UpdateSubCategoryRequest $request, string $slug) {


        $subCategory = SubCategory::find($slug);

        if ($request->hasFile('image')) {
            // Delete the old image file if it exists
            if ($subCategory->image) {
                unlink(public_path($subCategory->image));
            }

            $file = $request->file('image');
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/sub_category'), $fileName);
            $filePath = "uploads/sub_category/{$fileName}";

            $subCategory->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $filePath,
                'category_id' => $request->category_id,
            ]);

            toastr()->success('SubCategory updated with image');
        } else {
            $subCategory->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
            ]);

            toastr()->success('SubCategory updated without image');
        }

        return redirect()->route('sub-category.index');


}

/**
 * Remove the specified resource from storage.
 */
// public function destroy(string $slug) {

//     try {

//         $category = Category::where('slug', $slug)->first();

//         $oldImagePath = public_path($category->image); // Get the full path to the old image

//         if (file_exists($oldImagePath)) {
//             // Delete the old image
//             unlink($oldImagePath);
//         }

//         Category::where('slug', $slug)->delete();

//         toastr()->success('Category deleted');
//         return redirect()->route('category.index');

//     } catch (Exception $e) {
//         return "something went wrong";
//     }
// }

}
