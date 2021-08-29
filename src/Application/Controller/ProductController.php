<?php

namespace App\Application\Controller;

use App\Domain\Service\ProductManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductController
{
    private ProductManager $productManager;
    
    public function __construct(ProductManager $productManager)
    {
        $this->productManager = $productManager;
    }
    
    public function create(Request $request): JsonResponse
    {
        $product = $this->productManager->createProduct('Name', 'sku', 100);
        return new JsonResponse(
            [
                'product' => [
                    'id' => $product->id(),
                    'name' => $product->name(),
                ]
            ]
        );
    }
}
