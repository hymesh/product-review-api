<?php

namespace App\Dtos;

class ListReviewDto
{
    private $size;
    private $page;

    public function __construct($size, $page)
    {
        $this->size = $size;
        $this->page = $page;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getPage()
    {
        return $this->page;
    }
}