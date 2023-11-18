<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    function ProductList(){
        // $products = Product::where('is_active',1)->with('category')->latest('id')->all()->paginate(10);
        $products = Product::where('is_active', 1)
        ->with('category')
        ->latest('id')
        ->paginate(10);
        return view('backend.pages.product.list', compact('products'));
    }

    function ProductCreate(){
        $categories = Category::select(['id','title'])->get();
        return view('backend.pages.product.create', compact('categories'));
    }

    function ProductStore(StoreProductRequest $request){
        // dd($request->all());
        $product = Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'product_code' => $request->product_code,
            'product_price' => $request->product_price,
            'product_stock' =>$request->product_stock,
            'alert_quantity' =>$request->alert_quantity,
            'short_description' =>$request->short_description,
            'long_description' =>$request->long_description,
            'additional_info' =>$request->additional_info,

        ]);
        $this->image_upload($request, $product->id);
        $this->multiple_image_upload($request, $product->id);

        Session::flash('msg','Product created successfully');
        return redirect()->route('product.list');
    }

    function image_upload($request, $item_id){
        $product = Product::findOrFail($item_id);

        if ($request->hasFile('product_image')) {
            if ($product->product_image != 'default_product.jpg') {
                $old_photo_path = public_path('uploads/product/' . $product->product_image);

                // Check if the file exists before attempting to unlink
                if (file_exists($old_photo_path)) {
                    unlink($old_photo_path);
                }
            }

            $photo_location = 'uploads/product/';
            $uploaded_photo = $request->file('product_image');
            $new_photo_name = $product->id . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_location . $new_photo_name;

            // Save the image using the correct path
            $uploaded_photo->move(public_path($photo_location), $new_photo_name);

            $check = $product->update([
                'product_image' => $new_photo_name,
            ]);
        }
    }



    function multiple_image_upload($request,$product_id){
        if($request->hasFile('product_multiple_image')){
            $multiple_images = ProductImage::where('product_id',$product_id)->get();
            foreach ($multiple_images as $multiple_image) {
                if($multiple_image->product_multiple_photo_name !='dafault_product.jpg'){
                    $photo_location = 'public/uploads/product';
                    $old_photo_location = $photo_location.$multiple_image->product_multiple_photo_name;
                    unlink(base_path($old_photo_location));
                }
                $multiple_image->delete();
            }
            $flag = 1;  //assing a flag variable

            foreach ($request->file('product_multiple_image') as $single_photo) {
                $photo_location = 'public/uploads/product/';
                $new_photo_name = $product_id.'-'.$flag.'.'.$single_photo->getClientOriginalExtension();
                $new_photo_location = $photo_location.$new_photo_name;
                Image::make($single_photo)->resize(600,622)->save(base_path($new_photo_location),40);
                ProductImage::create([
                    'product_id'=>$product_id,
                    'product_multiple_image'=>$new_photo_name,
                ]);
                $flag++;
            }
        }
    }

    function ProductEdit($slug){
        $product = Product::whereSlug($slug)->first();
        $categories = Category::select(['id', 'title'])->get();
        return view('backend.pages.product.edit',compact('product','categories'));
    }

    function ProductUpdate(UpdateProductRequest $request, $slug){
        // dd($request->all());
        $product = Product::whereSlug($slug)->first();
        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'product_code' => $request->product_code,
            'product_price' => $request->product_price,
            'product_stock' =>$request->product_stock,
            'alert_quantity' =>$request->alert_quantity,
            'short_description' =>$request->short_description,
            'long_description' =>$request->long_description,
            'additional_info' =>$request->additional_info,

        ]);
        $this->image_upload($request, $product->id);
        $this->multiple_image_upload($request, $product->id);

        Session::flash('msg','Product updated successfully');
        return redirect()->route('product.list');
    }

    function ProductDestroy($slug){
        $product = Product::whereSlug($slug)->first();
        if(!$product){
            Session::flash('msg','Product not found');
            return redirect()->route('product.list');
        }
        elseif($product->product_image) {
            $photo_location = 'uploads/product/'.$product->product_image;

            if(file_exists($photo_location)) {
                unlink($photo_location);
            }else{
                Session::flash('msg','Image not found');
            }
        }

        $product->delete();
        Session::flash('msg','Product Deleted Successfully');
        return redirect()->route('product.list');
    }


}
