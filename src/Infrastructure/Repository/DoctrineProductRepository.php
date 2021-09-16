<?php

namespace App\Infrastructure\Repository;

use App\Domain\Model\Product;
use App\Domain\Repository\ProductCommandRepository;
use App\Domain\Repository\ProductQueryRepository;
use App\Infrastructure\Repository\DoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineProductRepository implements ProductQueryRepository, ProductCommandRepository
{
    private DoctrineRepository $doctrineRepository;

    public function __construct(ManagerRegistry $registry)
    {
        $this->doctrineRepository = new DoctrineRepository($registry, Product::class);
    }

    public function save(Product $product): void
    {
        $this->doctrineRepository->persist($product);
        $this->doctrineRepository->flush($product);
    }

    public function findOneById(string $id): Product
    {
        return $this->doctrineRepository->find($id);
    }
}
