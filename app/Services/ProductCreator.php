<?php

namespace App\Services;

use App\Dtos\CreateProductDto;
use App\Product;

class ProductCreator
{
    private $dto;

    public function __construct(CreateProductDto $dto)
    {
        $this->dto = $dto;
    }

    public function createProduct() {
        $product = Product::create(
            [
                'name' => $this->dto->getName(),
                'description' => $this->dto->getDescription(),
                'price' => $this->dto->getPrice()
            ]
        );

        return $product;
    }
}