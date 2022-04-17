<?php

declare(strict_types=1);

namespace App\Application\UseCases\Brand;

use App\Infra\UuidGenerate;
use App\Domain\Entities\Brand;
use App\Domain\ValueObjects\Slug;
use App\Domain\Repositories\BrandRepositoryInterface;

class CreateBrand
{
    public function __construct(private readonly BrandRepositoryInterface $repository)
    {
    }

    public function run(CreateBrandDTO $dto): void
    {
        $uuid = UuidGenerate::generate();
        $slug = new Slug($dto->slug);

        $brand = new Brand($uuid, $dto->name, $slug, $dto->active, $dto->imageUrl);
        $this->repository->create($brand);
    }
}