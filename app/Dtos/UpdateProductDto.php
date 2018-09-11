<?php


namespace App\Dtos;

use App\Http\Requests\UpdateProductRequest;

class UpdateProductDto
{
    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct(UpdateProductRequest $request, $productId)
    {
        $this->id = $productId;
        $this->name = $request->input('name', null);
        $this->description = $request->input('description', null);
        $this->price = $request->input('price', null);
    }

    public function getId()
    {
        return $this->id;
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