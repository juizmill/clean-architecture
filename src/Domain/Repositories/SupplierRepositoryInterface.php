<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Entities\Supplier;

interface SupplierRepositoryInterface extends RepositoryInterface
{
    public function create(Supplier $supplier): void;
}