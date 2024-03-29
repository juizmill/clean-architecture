<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Entities\Category;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function create(Category $category): void;
}