<?php

namespace App\Domain\Repository;

use App\Domain\Model\Product;

interface ProductQueryRepository
{
    public function findOneById(string $id): Product;
}
