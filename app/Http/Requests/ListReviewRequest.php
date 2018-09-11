<?php

namespace App\Http\Requests;

use App\Dtos\ListReviewDto;

class ListReviewRequest extends Request
{
    public function rules()
    {
        return [
            'page' => [
                'integer',
                'min:1',
            ],
            'size' => [
                'integer',
                'min:1',
            ],
        ];
    }

    public function getReviewListDto() {
        return new ListReviewDto(
            $this->input('page'),
            $this->input('size')
        );
    }
}
