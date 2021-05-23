<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function likes()
    {
        return $this->hasManyThrough(
            'App\Models\Post', //最終モデル
            'App\Models\Like', //中間モデル
            'user_id', //Likeの外部キー
            'id', //Postの外部キー
            null, //Usersのローカルキー
            'post_id' //LikeとPostを結ぶキー
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
