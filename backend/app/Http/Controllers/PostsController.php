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
        // $this->validate($request, Post::$rules);
        $post = new Post;
        $form = $request->all();
        unset($form['__token']);
        $post->fill($form)->save();
        return redirect('/');
    }
}
