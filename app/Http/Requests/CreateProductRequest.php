<?php

namespace App\Http\Requests;

class CreateProductRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer|min:0'
        ];
    }
}
