<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        return view("posts.index");
    }

    public function show()
    {
        return view("posts.show");
    }

    public function new()
    {
        return view("posts.new");
    }

    public function create(Request $request)
    {
        $this->validate($request, Post::$rules);
        $post = new Post;
        $file_name = $request->file('file_name');
        $form = $request->all();
        unset($form['_token']);
        $post->user_id = $request->user()->id;
        $post->fill($form)->save();
        return redirect('/');
    }
}
