<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Entities\Product;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function create(Product $product): void;
}