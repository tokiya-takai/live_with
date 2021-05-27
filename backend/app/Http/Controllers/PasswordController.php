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
        if(! isset($user) || ! $this->isCorrectUser($user->id) || $user->isguest){
            return redirect('/');
        }

        return view('users/password',compact('user'));
    }

    public function update(Request $request)
    {

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

        $user = User::find($request->id);
        if(! isset($user) || ! $this->isCorrectUser($user->id) || $user->isguest){
            return redirect('/');
        }

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

    private function isGuest($isguest)
    {
        if($isguest == 1) {
            return true;
        } else {
            return false;
        }
    }
}
