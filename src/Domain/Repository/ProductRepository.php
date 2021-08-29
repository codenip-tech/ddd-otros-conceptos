<?php

namespace App\Domain\Repository;

use App\Domain\Model\Product;

interface ProductRepository
{
    public function save(Product $product): void;
}
