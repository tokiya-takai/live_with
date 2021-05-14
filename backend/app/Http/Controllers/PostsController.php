<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    public function index()
    {
        $userSignedIn = Auth::check();
        if ($userSignedIn){
            $userId = Auth::id();
            $items = Post::where('user_id',$userId)->get();
            return view("posts.index",compact('items'));
        } else {
            // Display the number of users
            $users = User::count();
            return view('posts.guest', compact('users'));
        }
    }

    public function show($id)
    {
        $item = Post::find($id);
        $this->isCorrectUser($item);
        return view("posts.show", compact('item'));
    }

    public function new()
    {
        return view("posts.new");
    }

    public function create(Request $request)
    {
        $post = new Post;
        $this->savePost($request, $post);
        return redirect('/');
    }

    public function edit($id)
    {
        $item = Post::find($id);
        $this->isCorrectUser($item);
        return view('posts.edit', ['item'=>$item]);
    }

    public function update(Request $request)
    {
        $post = Post::find($request->id);
        $this->isCorrectUser($post);

        $this->savePost($request, $post);
        return redirect('/');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/');
    }

    private function savePost($request, $post)
    {
       // Validate
       $this->validate($request, Post::$rules, Post::$messages);

       // Insert data.
       $post->title = $request->title;
       $post->details = $request->details;
       $post->purchase_date = $request->purchase_date;
       $post->maintenance = $request->maintenance;
       $post->remarks = $request->remarks;
       $post->user_id = $request->user()->id;
       $post->update_date = date("Y/m/d H:i:s");

       // Check if the file exists.
       if($request->hasFile('file')) {
           if($request->file('file')->isvalid()){
               $fileData = $request->file('file');
               // // Insert file name
               $filePath = Storage::disk('s3')->putFile('myprefix', $fileData, 'public');
               $post->file_path = Storage::disk('s3')->url($filePath);
               $post->file_name = $fileData->getClientOriginalName();
           }
       }
       $post->save();
        return;
    }

    private function isCorrectUser($item)
    {
        if ($item->user_id != Auth::id()){
            return redirect('/');
        }
    }
}
