<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Entities\Category;

interface CategoryRepositoryInterface
{
    public function create(Category $category): void;

    public function findAll(): array;
}