<?php

namespace App\Dtos;

class ListReviewDto
{
    private $page;
    private $size;

    public function __construct(
        int $page = null,
        int $size = null
    ) {
        $this->page = $page;
        $this->size = $size;
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