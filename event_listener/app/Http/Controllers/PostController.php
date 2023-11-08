<?php

namespace App\Http\Controllers;

use App\Events\PostNotification;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postPage()
    {
        return view('post.create_post');
    }

    public function createPost(Request $request)
    {
        $user_id = auth()->user()->id;
        Post::create([
            'user_id' => $user_id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        $data = [
            'title'=> $request->title,
            'content'=> $request->content,
            'author'=>auth()->user()->email
        ];
        event(new PostNotification($data));

        return redirect()->route('dashboard');
    }


}
