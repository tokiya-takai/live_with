<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Rules\Current;

class PasswordController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->id);
        if(! ($user && $this->isCorrectUser($user->id))){
            return redirect('/');
        }

        if($this->isGuest($user->email)){
            return redirect('/');
        }

        return view('users/password',compact('user'));
    }

    public function update(Request $request)
    {

        if($this->isGuest($user->email)){
            redirect('/');
        }

        $rules = [
            'current_password' => new Current(),
            'password' => ['required', 'string', 'min:8', 'confirmed',]
        ];

        $messages = [
            'password.required'=>'入力必須項目です。',
            'password.string'=>'有効ではありません。',
            'password.min:8'=>'8文字以上である必要があります。',
            'password.confirmed'=>'確認用パスワードと一致しません。'
        ];

        $this->validate($request, $rules, $messages);

        $request->user()->fill([
            'password' => Hash::make($request->password)])->save();
        
        $url = "/users" . "/" . Auth::user()->id;
        return redirect($url);
    }

    private function isCorrectUser($id)
    {
        if ($id != Auth::id()){
            return false;
        }
        return true;
    }

    private function isGuest($email)
    {
        if($email == 'guest@test.co.jp') {
            return true;
        } else {
            return false;
        }
    }
}
