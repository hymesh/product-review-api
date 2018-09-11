<?php


namespace App\Services;


use App\Dtos\ListProductDto;
use Illuminate\Support\Facades\DB;

class ProductRetriever
{
    private $dto;

    public function __construct(ListProductDto $dto)
    {
        $this->dto = $dto;
    }

    public function retrieveProduct() {
        $products = DB::table('products');

        if ($this->dto->getName() !== null) {
            $products = $products->where('name', $this->dto->getName());
        }

        if ($this->dto->getDescription() !== null) {
            $products = $products->where('description', $this->dto->getDescription());
        }

        if ($this->dto->getPriceFrom() !== null) {
            $products = $products->where('price', '>=', $this->dto->getPriceFrom());
        }

        if ($this->dto->getPriceTo() !== null) {
            $products = $products->where('price', '<=', $this->dto->getPriceTo());
        }

        return $products;
    }
}