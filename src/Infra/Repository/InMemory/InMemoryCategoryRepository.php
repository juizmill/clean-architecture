<?php

declare(strict_types=1);

namespace App\Infra\Repository\InMemory;

use App\Domain\Entities\Category;
use App\Domain\Repositories\CategoryRepositoryInterface;

class InMemoryCategoryRepository implements CategoryRepositoryInterface
{
    private array $categories = [];

    public function create(Category $category): void
    {
        $this->categories[] = $category;
    }

    public function findAll(): array
    {
        return $this->categories;
    }
}