<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    protected $table = "posts";
    protected $fillable = ["file_name","file_path"];

    public static $rules = array(
        'user_id' => 'required',
        'title' => 'required',
    );
}
