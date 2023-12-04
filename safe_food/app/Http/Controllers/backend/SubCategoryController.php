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





/**
 * Show the form for creating a new resource.
 */
public function create() {
    return view('backend.page.category.create');
}

/**
 * Store a newly created resource in storage.
 */
public function store(StoreSubCategoryRequest $request) {

    if ($request->hasFile('image')) {

        $file = request()->file('image');
        $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension(); //for name making
        $file->move(public_path('/uploads/category'), $fileName);
        $filePath = "uploads/category/{$fileName}";

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $filePath,
        ]);

        toastr()->success('Category created with image');
        return redirect()->route('category.index');
    }
    Category::create([
        'name' => $request->name,
        'slug' => Str::slug($request->name),
    ]);
    toastr()->success('Category created without image');
    return redirect()->route('category.index');

}


}
