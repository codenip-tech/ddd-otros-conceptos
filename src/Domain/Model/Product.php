<?php

namespace App\Domain\Model;

use App\Domain\Value\PriceCents;

class Product
{
    private string $id;
    private string $name;
    private string $sku;
    private PriceCents $priceCents;

    public function __construct(string $id, string $name, string $sku, PriceCents $priceCents)
    {
        $this->id = $id;
        $this->name = $name;
        $this->sku = $sku;
        $this->priceCents = $priceCents;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function priceCents(): PriceCents
    {
        return $this->priceCents;
    }
}
