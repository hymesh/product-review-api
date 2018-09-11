<?php

namespace App\Http\Requests;

class CreateReviewRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content' => 'required'
        ];
    }
}
