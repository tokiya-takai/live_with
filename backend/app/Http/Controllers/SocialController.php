<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SocialController extends Controller
{
    public function index(){
        $users = User::where('isprivate', 0)
                ->with('posts');
        return view('social.index');
    }
}
