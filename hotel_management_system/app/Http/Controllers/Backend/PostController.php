<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    function index(){
        $posts = Post::latest()->paginate(10);
        return view('backend.pages.post.index',compact('posts'));
    }
    function create(){

        return view('backend.pages.post.create' );
    }
    function store(Request $request){

        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif',
            'heading' => 'required',
            'short_Content' => 'required',
            'long_Content' => 'required'

        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/post'), $final_name);

        $posts = new Post();
        $posts->photo = $final_name;

        $posts->heading = $request->heading;
        $posts->short_Content = $request->short_Content;
        $posts->long_Content = $request->long_Content;
        $posts->total_views = 1 ;
        $posts->save();

        return redirect()->route('post.page')->with('success', 'Post data create successfully');
    }

    function editPage($id){
        $posts = Post::where('id', $id)->first();
        return view('backend.pages.post.edit',compact('posts'));
    }

    function update(Request $request,$id){

        $posts = Post::where('id', $id)->first();

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            unlink(public_path('uploads/post/'.$posts->photo));
            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/post/'),$final_name);
            $posts->photo = $final_name;
        }

        $posts->heading = $request->heading;
        $posts->short_Content = $request->short_Content;
        $posts->long_Content = $request->long_Content;
        $posts->total_views = 1 ;
        $posts->update();

        return redirect()->route('post.page')->with('success', 'Post data update successfully');
    }

    function destroy($id){
        $single_data = Post::where('id', $id)->first();
        unlink(public_path('uploads/post/'.$single_data->photo));
        $single_data->delete();
        return redirect()->route('post.page')->with('success', 'Post is Deleted successfully.');
    }
}
