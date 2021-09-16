<?php

namespace App\Domain\Repository;

use App\Domain\Model\Product;

interface ProductCommandRepository
{
    public function save(Product $product): void;
}
