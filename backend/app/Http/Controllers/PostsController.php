<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Link;

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

        // Check if the post is public.
        if($this->isPrivate($item) && !$this->isCorrectUser($item)){
            return redirect('/');
        }

        // Is registered to favorite?
        $isLike = DB::table('likes')->where('user_id', Auth::id())->where('post_id', $item->id)->exists();
        // Count all likes
        $count = DB::table('likes')->where('post_id', $item->id)->count();

        // Get the link associated with the post.
        $links = Link::find($item->id);

        return view("posts.show", ['item'=>$item, 'isLike'=>$isLike, 'count'=>$count, 'links'=>$links]);
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
        if(! $this->isCorrectUser($item)){
            return redirect('/');
        }
        return view('posts.edit', ['item'=>$item]);
    }

    public function update(Request $request)
    {
        $post = Post::find($request->id);
        if(! $this->isCorrectUser($post)){
            return redirect('/');
        }

        $this->savePost($request, $post);
        return redirect('/');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if(! $this->isCorrectUser($post)){
            return redirect('/');
        }
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
            return false;
        }
        return true;
    }

    private function isPrivate($item)
    {
        $user = User::find($item->user_id);
        if($user->isprivate){
            return true;
        }
        return false;
    }
}
