<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
   function CategoryList(){
    $categories = Category::paginate(10);
    return view("backend.pages.category.list", compact("categories"));
   }

   function CategoryCreate(){
    return view("backend.pages.category.create");
   }
}
