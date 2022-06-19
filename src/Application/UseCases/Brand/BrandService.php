<?php

declare(strict_types=1);

namespace App\Application\UseCases\Brand;

use App\Infra\UuidGenerate;
use App\Domain\Entities\Brand;
use App\Domain\ValueObjects\Slug;
use App\Domain\Repositories\BrandRepositoryInterface;

class BrandService
{
    public function __construct(private readonly BrandRepositoryInterface $repository)
    {
    }

    public function create(InputBrandDTO $dto): void
    {
        $uuid = UuidGenerate::generate();
        $slug = new Slug($dto->slug);

        $brand = new Brand($uuid, $dto->name, $slug, $dto->active, $dto->imageUrl);
        $this->repository->create($brand);
    }

    public function find(string $uuid): ?OutputBrandDTO
    {
        $uuid = UuidGenerate::fromString($uuid);
        $brand = $this->repository->findByUuid($uuid);


        $output = new OutputBrandDTO();
        $output->uuid = $brand->getUuid();
        $output->name = $brand->getName();
        $output->slug = $brand->getSlug();
        $output->active = $brand->isActive();
        $output->imageUrl = $brand->getImageUrl();

        return $output;
    }

    public function findAll(): array
    {
        $result = [];
        $brands = $this->repository->findAll();

        foreach ($brands as $brand) {
            $output = new OutputBrandDTO();
            $output->uuid = $brand->getUuid();
            $output->name = $brand->getName();
            $output->slug = $brand->getSlug();
            $output->active = $brand->isActive();
            $output->imageUrl = $brand->getImageUrl();

            $result[] = $output;
            unset($output);
        }

        return $result;
    }
}