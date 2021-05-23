<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Like;
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
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
            'isprivate' => ['boolean'],
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
            'isprivate.boolean' => '真偽値(true, false, 1, 0)のみ有効です。',
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
            Auth::user()->isprivate = $request->isprivate;
            Auth::user()->save();

            // This is not an error, it is used as an alternative to flash.
            throw ValidationException::withMessages(['success' => '変更しました。']);
            return redirect($url);
        }
    }

    public function show($id)
    {
        // $items =  Like::with(['post', 'user'])->where('user_id', Auth::id())->get();
        $items = DB::table('posts')
                ->select('*','likes.user_id as likes_user_id')
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->join('likes', 'posts.id', '=', 'likes.post_id')
                ->where('isprivate', 0)
                ->where('likes.user_id', Auth::id())
                ->get();
        // var_dump($items);
        // dd($items->toSql(), $items->getBindings());
        return view('users.show', ['items'=>$items]);
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
        }
        return false;
    }
}
