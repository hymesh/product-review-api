<?php


namespace App\Services;


use App\Dtos\UpdateProductDto;
use App\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductModifier
{
    private $dto;

    public function __construct(UpdateProductDto $dto)
    {
        $this->dto = $dto;
    }

    public function modifyProduct() {
        try {
            $product = Product::findOrFail($this->dto->getId());

            if ($this->dto->getName() !== null) {
                $product->name = $this->dto->getName();
            }

            if ($this->dto->getDescription() !== null) {
                $product->description = $this->dto->getDescription();
            }

            if ($this->dto->getPrice() !== null) {
                $product->price = $this->dto->getPrice();
            }

            return $product;
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }
}