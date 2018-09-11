<?php

namespace App\Http\Requests;

use App\Dtos\CreateProductDto;

class CreateProductRequest extends Request
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'price' => [
                'required',
                'integer',
                'min:0',
            ]
        ];
    }

    public function getProductCreateParamDto() {
        return new CreateProductDto(
            $this->input('name'),
            $this->input('description'),
            $this->input('price')
        );
    }
}
