<?php

namespace App\Models\Dtos;

use JsonSerializable;
use App\Models\Product;

class ProductRateDto implements JsonSerializable
{
    private $product;
    private $rating;

    public function getProduct(): array
    {
        return $this->product;
    }

    public function setProduct($product): void
    {
        $this->product = $product;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating): void
    {
        $this->rating = $rating;
    }

    public function jsonSerialize() {
        return [
            'product' => $this->product,
            'rating' => $this->rating,
        ];
    }
}