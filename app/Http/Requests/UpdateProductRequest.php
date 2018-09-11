<?php

namespace App\Http\Requests;

use App\Dtos\UpdateProductDto;

class UpdateProductRequest extends Request
{
    public function rules()
    {
        return [
            'price' => 'integer|min:0'
        ];
    }

    public function getProductUpdateParamDto() {
        return new UpdateProductDto(
            $this->input('name', null),
            $this->input('description', null),
            $this->input('price', null)
        );
    }
}
