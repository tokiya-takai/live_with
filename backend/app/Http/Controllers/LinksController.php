<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinksController extends Controller
{
    public function register(Request $request)
    {
        $this.validate($request, Like::$rules);
        
        $link = Link::find($request->id);
        if(is_null($link)){
            $link = new Link;
        } else {
            $isAdded = true;
        }
        $link->post_id = $request->id;

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

        if($isAdded){
            $link->update();
        }else{
            $link->save();
        }

        return redirect()->route('posts.show', ['id'=>$request->id]);
    }
}
