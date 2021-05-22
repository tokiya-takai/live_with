<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB; 
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
        return redirect()->route('posts.show', ['id'=>$request->id]);
    }

    public function destroy(Request $request)
    {
        DB::table('likes')->where('user_id', Auth::id())->where('post_id', $request->id)->delete();
        return redirect()->route('posts.show', ['id'=>$request->id]);
    }
}
