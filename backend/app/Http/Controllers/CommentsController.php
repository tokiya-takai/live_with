<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Comment;

class CommentsController extends Controller
{
    public function create(Request $request) {

        $this->validate($request, Comment::$rules, Comment::$messages);
        if(! Auth::check()){
            return;
        }

        $comment = new Comment;
        $comment->post_id = $request->id;
        $comment->user_id = Auth::id();
        $comment->content = $request->content;

        $comment->save();

        return back()->withInput();
    }

    public function delete() {

    }
}
