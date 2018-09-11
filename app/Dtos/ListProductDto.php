<?php

namespace App\Dtos;

class ListProductDto
{
    private $name;
    private $description;
    private $priceFrom;
    private $priceTo;
    private $page;
    private $size;

    public function __construct(
        string $name = null,
        string $description = null,
        int $priceFrom = null,
        int $priceTo = null,
        int $page = null,
        int $size = null
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->priceFrom = $priceFrom;
        $this->priceTo = $priceTo;
        $this->page = $page;
        $this->size = $size;
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

    public function getPage()
    {
        return $this->page;
    }

    public function getSize()
    {
        return $this->size;
    }
}