<?php

namespace App\Dtos;

use App\Http\Requests\CreateProductRequest;

class CreateProductDto
{
    private $name;
    private $description;
    private $price;

    public function __construct(CreateProductRequest $request)
    {
        $this->name = $request->input('name', null);
        $this->description = $request->input('description', null);
        $this->price = $request->input('price', null);
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