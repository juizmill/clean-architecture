<?php

declare(strict_types=1);

namespace App\Infra\Repository\InMemory;

use App\Domain\Entities\Brand;
use App\Domain\Repositories\BrandRepositoryInterface;

class InMemoryBrandRepository implements BrandRepositoryInterface
{
    private array $brand = [];

    public function create(Brand $brand): void
    {
        $this->brand[] = $brand;
    }

    public function findAll(): array
    {
        return $this->brand;
    }
}