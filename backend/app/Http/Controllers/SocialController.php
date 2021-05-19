<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    public function index(){
        // $users = User::where('isprivate', 0)->get();
        // return view('social.index', ['users'=>$users]);
        $users = DB::table('users')
            ->join('posts','users.id','=','posts.user_id')
            ->where('isprivate', 0)
            ->orderBy('update_date', 'desc')
            ->limit(1)
            ->get();
        return view('/social/index', compact('users'));
        // dd($users->toSql(), $users->getBindings());
    }
}
