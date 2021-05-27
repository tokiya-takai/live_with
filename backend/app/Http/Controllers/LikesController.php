<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Post;
use App\Models\Like;

class LikesController extends Controller
{

    public function store(Request $request)
    {
        $like = new Like;
        $like->user_id = Auth::id();
        $like->post_id = $request->id;
        $like->save();
        if($request->source == 'show'){
            return redirect()->route('posts.show', ['id'=>$request->id]);
        } else {
            return redirect()->route('social.index');
        }
    }

    public function destroy(Request $request)
    {
        Like::where('user_id', Auth::id())->where('post_id', $request->id)->delete();
        if($request->source == 'show'){
            return redirect()->route('posts.show', ['id'=>$request->id]);
        } else {
            return redirect()->route('social.index');
        }
    }
}
