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
        $post = new Post;
        $post = $this->savePost($request, $post);
        if ($post->save()){
            return redirect('/');
        }else{
            $item = $request;
            $item->file_path = $post->file_path;
            return view('posts.edit', ['item'=>$item]);
        }
        return redirect('/');
    }

    public function edit($id)
    {
        $item = Post::find($id);
        return view('posts.edit', ['item'=>$item]);
    }

    public function update(Request $request)
    {
        $post = Post::find($request->id);

        $post = $this->savePost($request, $post);
        if ($post->save()){
            return redirect('/');
        }else{
            $item = $request;
            $item->file_path = $post->file_path;
            return view('posts.edit', ['item'=>$item]);
        }
    }

    private function savePost($request, $post)
    {
       // Validate title Column
       $this->validate($request, Post::$rules);

       // Insert data.
       $post->title = $request->title;
       $post->content = $request->content;
       $post->user_id = $request->user()->id;

       // Check if the file exists.
       if($request->hasFile('file')) {
           if($request->file('file')->isvalid()){
               $fileData = $request->file('file');
               // // Insert file name
               $filePath = $fileData->store('public/image');
               $filePath = str_replace('public/image/', '', $filePath);
   
               $post->file_path = $filePath;
               $post->file_name = $fileData->getClientOriginalName();
           }
       }
        return $post;
    }
}
