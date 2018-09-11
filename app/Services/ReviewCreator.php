<?php

namespace App\Services;

use App\Review;

class ReviewCreator
{
    public function createReview(string $content) {
        return new Review([
            'content' => $content,
        ]);
    }
}