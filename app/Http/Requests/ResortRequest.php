<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResortRequest extends FormRequest
{

    public function authorize()
    {
        //if(request()->ip === 179.122.12.1)
        return true;
        // return false;
    }


    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'gt:0'],
            'description' => ['required', 'max:255'],
            'image' => ['required', 'image', 'max:2048'],
        ];
    }
}
