<?php


namespace App\Dtos;

class UpdateProductDto
{
    private $name;
    private $description;
    private $price;

    public function __construct(
        string $name = null,
        string $description = null,
        int $price = null
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