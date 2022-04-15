<?php

declare(strict_types=1);

namespace App\Infra\Repository\InMemory;

use App\Domain\Entities\Supplier;
use App\Domain\Repositories\SupplierRepositoryInterface;

class InMemorySupplierRepository implements SupplierRepositoryInterface
{
    private array $suppliers = [];

    public function create(Supplier $supplier): void
    {
        $this->suppliers[] = $supplier;
    }

    public function findAll(): array
    {
        return $this->suppliers;
    }
}