<?php

namespace App\Domain\Service;

use App\Domain\Model\Product;
use App\Domain\Repository\ProductCommandRepository;
use App\Domain\Repository\ProductQueryRepository;
use App\Domain\Value\PriceCents;
use Ramsey\Uuid\Uuid;

class ProductManager
{
    private ProductQueryRepository $productQueryRepository;
    private ProductCommandRepository $productCommandRepository;

    public function __construct(
        ProductQueryRepository $productQueryRepository,
        ProductCommandRepository $productCommandRepository
    ){
        $this->productQueryRepository = $productQueryRepository;
        $this->productCommandRepository = $productCommandRepository;
    }

    public function createProduct(string $name, string $sku, int $priceCents): Product
    {
        $id = Uuid::uuid4()->toString();
        $product = new Product($id, $name, $sku, new PriceCents($priceCents));
        
        $this->productCommandRepository->save($product);

        return $product;
    }

    public function getProduct(string $id): Product
    {
        return $this->productQueryRepository->findOneById($id);
    }
}
