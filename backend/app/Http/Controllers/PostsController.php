<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $posts = Post::where('user_id',$userId);

        return view("posts.index", ['posts'=>$posts]);
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
        // Validate title Column
        $this->validate($request, Post::$rules);

        $post = new Post;
        
        // Insert data other than image file.
        $postData = $request->except('file');
        $post->fill($postData);
        unset($postData['_token']);

        // Check if the file exists.
        $fileData = $request->file('file');
        if($fileData->isValid()) {
            // Insert file name
            $post->file_name = $fileData->getClientOriginalName();

            // Save file and insert the saved file path
            $filePath = $fileData->store('public/temp');
            $post->file_path = str_replace('public/', 'storage/', $filePath);
        }
        // Insert current user ID
        $post->user_id = $request->user()->id;

        // Save and return to home page
        $post->save();
        return redirect('/');
    }
}
