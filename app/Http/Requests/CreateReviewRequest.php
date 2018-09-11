<?php

namespace App\Http\Requests;

class CreateReviewRequest extends Request
{
    public function rules()
    {
        return [
            'content' => 'required',
        ];
    }
}
