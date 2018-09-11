<?php

namespace App\Http\Requests;

use App\Dtos\ListProductDto;

class ListProductRequest extends Request
{
    public function rules()
    {
        return [
            'price_from' => 'integer|min:0',
            'price_to' => 'integer|min:0',
            'page' => [
                'integer',
                'min:0',
            ],
            'size' => [
                'integer',
                'min:0',
            ],
        ];
    }

    public function getProductSearchParamDto()
    {
        return new ListProductDto(
            $this->input('name'),
            $this->input('description'),
            $this->input('price_from'),
            $this->input('price_to'),
            $this->input('page'),
            $this->input('size')
        );
    }
}
