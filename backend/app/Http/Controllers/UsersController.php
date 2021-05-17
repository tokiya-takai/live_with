<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Lib\Current;


class UsersController extends Controller
{
    public function index(Request $reauest){

        $user = User::find($reauest->id);
        // Authenticate user
        if(! ($user && $this->isCorrectUser($user->id))){
            return redirect('/');
        }

        $isGuest = $this->isGuest($user->email);

        return view('users/index', ['isGuest'=>$isGuest, 'user'=>$user]);
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())]
        ];
        $messages = [
            'name.required' => '入力必須項目です。',
            'name.string' => '数値は有効ではありません。',
            'name.max' => '255字以内です。',
            'email.required' => '入力必須項目です。',
            'email.string' => '数値は有効ではありません。',
            'email.email' => 'メールアドレスが必要です。',
            'email.max' => '255字以内です。',
            'email.unique' => 'このメールアドレスは既に利用されています。',
        ];

        $this->validate($request, $rules, $messages);

        $password = $request->password;
        $url = "/users" . "/" . Auth::user()->id;

        if(! Hash::check($password, Auth::user()->password)){
            throw ValidationException::withMessages(['password' => 'パスワードが一致しません。']);
            return redirect($url);
        }
        if (Auth::check()) {
            Auth::user()->name = $request->name;
            Auth::user()->email = $request->email;
            Auth::user()->save();

            // This is not an error, it is used as an alternative to flash.
            throw ValidationException::withMessages(['success' => '変更しました。']);
            return redirect($url);
        }
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
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}
