<?php

declare(strict_types=1);

namespace App\Infra\Repository\InMemory;

use App\Domain\Entities\Brand;
use App\Domain\ValueObjects\Uuid;
use App\Domain\Repositories\BrandRepositoryInterface;

class InMemoryBrandRepository implements BrandRepositoryInterface
{
    private array $brands = [];

    public function create(Brand $brand): void
    {
        $this->brands[] = $brand;
    }

    public function findAll(): array
    {
        return $this->brands;
    }

    public function findByUuid(Uuid $uuid): ?Brand
    {
        foreach ($this->brands as $brand) {
            /** @var Brand $brand */
            if ((string)$brand->getUuid() === (string)$uuid) {
                return $brand;
            }
        }

        return null;
    }
}