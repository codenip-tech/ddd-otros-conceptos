<?php

namespace App\Domain\Service;

use App\Domain\Model\Product;
use App\Domain\Repository\ProductRepository;
use App\Domain\Value\PriceCents;
use Ramsey\Uuid\Uuid;

class ProductManager
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function createProduct(string $name, string $sku, int $priceCents): Product
    {
        $id = Uuid::uuid4()->toString();
        $product = new Product($id, $name, $sku, new PriceCents($priceCents));
        
        $this->productRepository->save($product);

        return $product;
    }

    public function getProduct(string $id): Product
    {
        return $this->productRepository->findOneById($id);
    }
}
