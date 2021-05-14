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

    protected $guarded = array('id','content','file_name','file_path');
    
    protected $table = "posts";
    protected $fillable = ["file_name","file_path"];

    public static $rules = [
        'title' => ['required', 'max:50'],
        'details' => ['max:500'],
        'maintenance'=> ['max:1000'],
        'remarks' => ['max:1000']
    ];
}
