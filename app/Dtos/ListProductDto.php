<?php

namespace App\Dtos;

use App\Http\Requests\ListProductRequest;

class ListProductDto
{
    private $name;
    private $description;
    private $priceFrom;
    private $priceTo;

    public function __construct(ListProductRequest $request)
    {
        $this->name = $request->input('name', null);
        $this->description = $request->input('description', null);
        $this->priceFrom = $request->input('price_from', null);
        $this->priceTo = $request->input('price_to', null);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPriceFrom()
    {
        return $this->priceFrom;
    }

    public function getPriceTo()
    {
        return $this->priceTo;
    }
}