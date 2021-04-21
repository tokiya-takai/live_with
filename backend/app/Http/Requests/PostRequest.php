<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        if ($this->path() == 'posts')
        {
            return true;
        } else {
            return false;
        }
    }

    public function rules()
    {
        return [
            'title' => 'required',
        ];
    }
}
