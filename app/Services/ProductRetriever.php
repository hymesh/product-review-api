<?php


namespace App\Services;


use App\Dtos\ListProductDto;
use App\Product;

class ProductRetriever
{
    public function retrieveProduct(ListProductDto $dto) {
        $builder = Product::query();

        $name = $dto->getName();
        if ($name !== null) {
            $builder->where('name', $name);
        }

        if ($dto->getDescription() !== null) {
            $builder->where('description', $dto->getDescription());
        }

        if ($dto->getPriceFrom() !== null) {
            $builder->where('price', '>=', $dto->getPriceFrom());
        }

        if ($dto->getPriceTo() !== null) {
            $builder->where('price', '<=', $dto->getPriceTo());
        }

        return $builder->paginate($dto->getSize(), ['*'], 'page', $dto->getPage());
    }
}