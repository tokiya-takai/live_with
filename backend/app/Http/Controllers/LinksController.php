<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Link;
use App\Models\Post;

class LinksController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, Link::$rules);
        
        $link = new Link;

        $link->post_id = $request->id;
        $link = $this->setData($link, $request);
        $link->save();

        // Update date update
        $post = Post::find($request->id);
        $post->update_date = date("Y/m/d H:i:s");
        $post->update();

        return redirect()->route('posts.show', ['id'=>$request->id]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Link::$rules);

        // Whether it belongs to myself.
        if(! $this->isCorrectUser($request)){
            return redirect('/');
        }

        $link = Link::find($request->id);
        $link = $this->setData($link, $request);
        $link->update();

        // Update date update
        $post = Post::find($link->post_id);
        $post->update_date = date("Y/m/d H:i:s");
        $post->update();

        return redirect()->route('posts.show', ['id'=>$link->post_id]);
    }

    private function isCorrectUser($request)
    {
        $post = Post::find($request->id);
        if ($post->user_id != Auth::id()){
            return false;
        }
        return true;
    }

    private function setData($link, $request)
    {
        $link->link1 = $request->link1;
        if(is_null($request->link1)){
            $link->link1 = "";
        }
        
        $link->link2 = $request->link2;
        if(is_null($request->link2)){
            $link->link2 = "";
        }
        
        $link->link3 = $request->link3;
        if(is_null($request->link3)){
            $link->link3 = "";
        }

        $link->link4 = $request->link4;
        if(is_null($request->link4)){
            $link->link4 = "";
        }
        
        $link->link5 = $request->link5;
        if(is_null($request->link5)){
            $link->link5 = "";
        }

        return $link;
    }
}
