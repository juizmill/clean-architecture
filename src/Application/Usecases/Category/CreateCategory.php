<?php

declare(strict_types=1);

namespace App\Application\Usecases\Category;

use App\Infra\UuidGenerate;
use App\Domain\Entities\Category;
use App\Domain\Repositories\CategoryRepositoryInterface;

class CreateCategory
{
    public function __construct(private CategoryRepositoryInterface $repository)
    {
    }

    public function run(CreateCategoryDTO $dto): void
    {
        $uuid = UuidGenerate::generate();
        $category = new Category($uuid, $dto->name, $dto->description);
        $this->repository->create($category);
    }
}