<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public static $rules = [
        'link1' => ['url'],
        'link2' => ['url'],
        'link3' => ['url'],
        'link4' => ['url'],
        'link5' => ['url'],
    ];
}
