<?php

declare(strict_types=1);

namespace App\Infra\Repository\InMemory;

use App\Domain\Entities\Category;
use App\Domain\ValueObjects\Uuid;
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

    public function find(Uuid $uuid): ?Category
    {
        foreach ($this->categories as $category) {
            /** @var Category $category */
            if ((string)$category->getUuid() === (string)$uuid) {
                return $category;
            }
        }

        return null;
    }
}