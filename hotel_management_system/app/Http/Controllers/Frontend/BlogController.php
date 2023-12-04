<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    function index(){

        $posts = Post::orderBy('id', 'desc')->paginate(9);
        return view('frontend.pages.blog',compact('posts'));
    }
    function singleBlog($id){
        $single_blog = Post::where('id', $id)->first();
        $single_blog->total_views = $single_blog->total_views+1 ; 
        $single_blog->update();
        return view('frontend.components.single_blog', compact('single_blog'));
    }
}
