<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

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
}
