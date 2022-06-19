<?php

declare(strict_types=1);

namespace App\Infra\Repository\InMemory;

use App\Domain\Entities\Product;
use App\Domain\ValueObjects\Uuid;
use App\Domain\Repositories\ProductRepositoryInterface;

class InMemoryProductRepository implements ProductRepositoryInterface
{
    private array $products = [];

    public function create(Product $product): void
    {
        $this->products[] = $product;
    }

    public function findAll(): array
    {
        return $this->products;
    }

    public function findByUuid(Uuid $uuid): ?Product
    {
        foreach ($this->products as $product) {
            /** @var Product $product */
            if ((string)$product->getUuid() === (string)$uuid) {
                return $product;
            }
        }

        return null;
    }
}