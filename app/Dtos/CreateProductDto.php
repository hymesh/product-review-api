<?php

namespace App\Dtos;

class CreateProductDto
{
    private $name;
    private $description;
    private $price;

    public function __construct(
        string $name,
        string $description,
        int $price
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }
}