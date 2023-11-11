<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function postPage(){
        // $posts = Post::all();
        $posts = Post::paginate(5);
        // $posts = Post::simplePaginate(5);  //next and previous posts (not 1 2 3 )
        return view('post.index',compact('posts'));
    }
    public function postCreate(){
      return view('post.create');
    }
    public function postadd(Request $request){
    //   return $request->all();
        $request->validate(
            [
            'title' => 'required|max:255',
            'content' => 'required',
            ],
            [
                'title.required' => 'The title is required.',
                'content.required' => 'The content is required.',
            ]

        );

        $posts = new Post();
        $posts->user_id = auth()->user()->id;
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->save();

        Session::flash('msg','Data insert successfully');

        return redirect('/posts');
    }


    public function postEdit($id){
        $posts = Post::find($id);
        return view('post.edit',compact('posts'));
    }


    public function postUpdate(Request $request, $id){
        //   return $request->all();
            $request->validate(
                [
                'title' => 'required|max:255',
                'content' => 'required',
                ],
                [
                    'title.required' => 'The title is required.',
                    'content.required' => 'The content is required.',
                ]

            );

            $posts = Post::find($id);
            $posts->user_id = auth()->user()->id;
            $posts->title = $request->title;
            $posts->content = $request->content;
            $posts->save();

            Session::flash('msg','Data update successfully');

            return redirect('/posts');
        }


        public function postDelete(Request $request, $id){
            $posts = Post::find($id);
            $posts->delete();
            Session::flash('msg','Data delete successfully');

            return redirect('/posts');

        }
}
