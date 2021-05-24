<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public static $rules = [
        'content'=> ['required','max:140'],
    ];

    public static $messages = [
        'content.required' => '入力必須項目です。',
        'content.max' => '最大文字数は140字です。',
    ];
}
