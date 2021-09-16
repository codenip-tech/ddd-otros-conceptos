<?php

namespace App\Infrastructure\Repository;

use App\Domain\Model\Product;
use App\Domain\Repository\ProductQueryRepository;

class DoctrineInMemoryCachedRepository implements ProductQueryRepository
{
    private DoctrineProductRepository $productRepository;
    private array $products = [];

    public function __construct(DoctrineProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function findOneById(string $id): Product
    {
        if (!array_key_exists($id, $this->products)) {
            $this->products[$id] = $this->productRepository->findOneById($id);
        }

        return $this->products[$id];
    }
}
