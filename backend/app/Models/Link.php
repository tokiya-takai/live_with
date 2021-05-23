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
        'link1' => ['nullable','url'],
        'link2' => ['nullable','url'],
        'link3' => ['nullable','url'],
        'link4' => ['nullable','url'],
        'link5' => ['nullable','url'],
    ];
}
