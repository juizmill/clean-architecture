<?php

namespace App\Application\UseCases\Product;

use App\Infra\UuidGenerate;
use App\Domain\Repositories\BrandRepositoryInterface;
use App\Domain\Repositories\ProductRepositoryInterface;
use App\Domain\Repositories\CategoryRepositoryInterface;
use App\Application\UseCases\Product\Builder\ProductBuilder;
use App\Application\Exceptions\NotFoundResultRepositoryException;

class CreateProduct
{
    public function __construct(
        private readonly ProductRepositoryInterface $productRepository,
        private readonly CategoryRepositoryInterface $categoryRepository,
        private readonly BrandRepositoryInterface $brandRepository,
    ) {
    }

    public function run(CreateProductDTO $dto): void
    {
        $category = $this->getCategory($dto);
        $brand = $this->getBrand($dto);

        $productBuilder = new ProductBuilder(
            $dto->name,
            $dto->slug,
            $dto->warranty,
            $category,
            $brand,
            $dto->origin,
            $dto->unitType
        );

        $productBuilder->buildMeasurements($dto->width, $dto->height, $dto->length, $dto->weight);
        $productBuilder->buildProductDescription($dto->short, $dto->long, $dto->technical, $dto->includedItem);
        $productBuilder->buildTaxReplacement($dto->cest, $dto->ncm, $dto->ean);

        $product = $productBuilder->getProduct();
        $this->productRepository->create($product);
    }

    private function getCategory(CreateProductDTO $dto): mixed
    {
        $category = $this->categoryRepository->findByUuid(UuidGenerate::fromString($dto->uuidCategory));
        if ($category === null) {
            throw new NotFoundResultRepositoryException(
                "Categoria {$dto->uuidCategory} não encontrado."
            );
        }
        return $category;
    }

    private function getBrand(CreateProductDTO $dto): mixed
    {
        $brand = $this->brandRepository->findByUuid(UuidGenerate::fromString($dto->uuidBrand));
        if ($brand === null) {
            throw new NotFoundResultRepositoryException(
                "Marca {$dto->uuidBrand} não encontrado."
            );
        }
        return $brand;
    }
}