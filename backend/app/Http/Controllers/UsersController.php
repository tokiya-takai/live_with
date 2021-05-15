<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class UsersController extends Controller
{
    public function index(Request $reauest){
        $user = User::find($reauest->id);
        // Authenticate user
        if($user){
            $this->isCorrectUser($user->id);
        } else {
            return redirect('/');
        }

        $guest = $this->isGuest($user->email);

        return view('users/index', ['guest'=>$guest, 'user'=>$user]);
    }

    private function isCorrectUser($id)
    {
        if ($id != Auth::id()){
            return redirect('/');
        }
    }

    private function isGuest($email)
    {
        if($email == 'guest@test.co.jp') {
            $guest = true;
        } else {
            $guest = false;
        }
        return $guest;
    }
}
