<?php

namespace App\Http\Requests;

use App\Dtos\ListReviewDto;

class ListReviewRequest extends Request
{
    public function rules()
    {
        return [
            'size' => [
                'integer',
                'min:1',
            ],
            'page' => [
                'integer',
                'min:1',
            ]
        ];
    }

    public function getReviewListDto() {
        return new ListReviewDto(
            $this->input('size', null),
            $this->input('page', null)
        );
    }
}
