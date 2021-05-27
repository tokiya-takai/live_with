<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SocialController extends Controller
{
    public function index(){
        $users = User::select('*', 'posts.id AS post_id')
            ->join('posts','users.id','=','posts.user_id')
            ->where('isprivate', 0)
            ->orderBy('update_date', 'desc')
            ->get();

        return view('/social/index', compact('users'));
        // dd($users->toSql(), $users->getBindings());
    }
}
