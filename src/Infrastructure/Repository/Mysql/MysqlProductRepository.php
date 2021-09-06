<?php

namespace App\Infrastructure\Repository\Mysql;

use App\Domain\Model\Product;
use App\Domain\Repository\ProductRepository;

class MysqlProductRepository implements ProductRepository
{
    public function save(Product $product): void
    {
        $product->setName('testing');
    }
}
