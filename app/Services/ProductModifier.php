<?php


namespace App\Services;


use App\Dtos\UpdateProductDto;
use App\Product;

class ProductModifier
{
    public function modifyProduct(Product $product, UpdateProductDto $dto) {
        $name = $dto->getName();
        if ($name !== null) {
            $product->name = $name;
        }

        $description = $dto->getDescription();
        if ($description !== null) {
            $product->description = $description;
        }

        $price = $dto->getPrice();
        if ($price !== null) {
            $product->price = $price;
        }

        return $product;
    }
}