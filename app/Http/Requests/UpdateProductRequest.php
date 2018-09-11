<?php

namespace App\Http\Requests;

class UpdateProductRequest extends Request
{
    public function rules()
    {
        return [
            'price' => 'integer|min:0'
        ];
    }
}
