<?php

namespace App\Http\Requests;

class ListProductRequest extends Request
{
    public function rules()
    {
        return [
            'price_from' => 'integer|min:0',
            'price_to' => 'integer|min:0',
            'page_size' => 'integer|min:1'
        ];
    }
}
