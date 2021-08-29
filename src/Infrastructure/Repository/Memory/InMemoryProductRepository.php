<?php

namespace App\Infrastructure\Repository\Memory;

use App\Domain\Model\Product;
use App\Domain\Repository\ProductRepository;

class InMemoryProductRepository implements ProductRepository
{
    private array $products = [];

    public function save(Product $product): void
    {
        $this->products[$product->id()] = $product;
    }
}
