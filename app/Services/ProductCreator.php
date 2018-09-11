<?php

namespace App\Services;

use App\Dtos\CreateProductDto;
use App\Product;

class ProductCreator
{
    public function createProduct(CreateProductDto $dto): Product {
        $product = Product::create(
            [
                'name' => $dto->getName(),
                'description' => $dto->getDescription(),
                'price' => $dto->getPrice(),
            ]
        );

        return $product;
    }
}