<?php

namespace App\Services;

use App\Dtos\ListReviewDto;
use App\Product;

class ReviewRetriever
{
    public function retrieveReviews(Product $product, ListReviewDto $dto) {
        $size = $dto->getSize() ?: 15;
        $page = $dto->getPage() ?: 1;

        return $product->reviews()->getQuery()->paginate(
                $size,
                ['*'],
                'page',
                $page
            );
    }
}