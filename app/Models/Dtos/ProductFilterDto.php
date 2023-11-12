<?php

namespace App\Models\Dtos;

use JsonSerializable;
use App\Models\Product;

class ProductFilterDto implements JsonSerializable
{
    private array $products;
    private $currentPage;
    private $pageTotal;

    public function getProducts(): array
    {
        return $this->products;
    }

    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function setCurrentPage($currentPage): void
    {
        $this->currentPage = $currentPage;
    }

    public function getPageTotal()
    {
        return $this->pageTotal;
    }

    public function setPageTotal($pageTotal): void
    {
        $this->pageTotal = $pageTotal;
    }

    public function jsonSerialize() {
        return [
            'products' => $this->products,
            'currentPage' => $this->currentPage,
            'pageTotal' => $this->pageTotal
        ];
    }
}