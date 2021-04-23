<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $items = Post::where('user_id',$userId)->get();
        return view("posts.index",compact('items'));
    }

    public function show($id)
    {
        $item = Post::find($id);
        return view("posts.show", compact('item'));
    }

    public function new()
    {
        return view("posts.new");
    }

    public function create(Request $request)
    {
        // Validate title Column
        $this->validate($request, Post::$rules);

        $post = new Post;
        
        // Insert data.
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user()->id;

        // Check if the file exists.
        $fileData = $request->file('file');
        if($fileData->isValid()) {
            // // Insert file name
            $filePath = $fileData->store('public/image');
            $filePath = str_replace('public/image/', '', $filePath);

            $post->file_path = $filePath;
            $post->file_name = $fileData->getClientOriginalName();
        }

        // Save and return to home page
        $post->save();
        return redirect('/');
    }
}
