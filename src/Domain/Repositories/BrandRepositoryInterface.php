<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Entities\Brand;

interface BrandRepositoryInterface extends RepositoryInterface
{
    public function create(Brand $brand): void;
}