<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    protected $guarded = array('id','content','file_name','file_path');
    
    protected $table = "posts";
    protected $fillable = ["file_name","file_path"];
    protected $dates = ['update_date'];

    public static $rules = [
        'title' => ['required', 'max:50'],
        'details' => ['max:500'],
        'maintenance'=> ['max:1000'],
        'remarks' => ['max:1000']
    ];

    public static $messages = [
        'title.required' => '入力必須項目です。',
        'title.max' => '50文字まで入力可能です。',
        'details.max' => '500文字まで入力可能です。',
        'maintenance.max' => '1000文字まで入力可能です。',
        'remarks.max' => '1000文字まで入力可能です。',
    ];
}
