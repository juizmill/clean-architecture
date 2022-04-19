<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Uuid;
use App\Domain\ValueObjects\Slug;
use App\Domain\Enums\UnitTypeEnum;
use App\Domain\Enums\ProductOriginEnum;
use App\Domain\ValueObjects\Measurements;
use App\Domain\ValueObjects\TaxReplacement;
use App\Domain\ValueObjects\ProductDescription;

class Product
{
    public function __construct(
        private readonly Uuid $uuid,
        private readonly string $name,
        private readonly Slug $slug,
        private readonly Category $category,
        private readonly Brand $brand,
        private readonly int $warranty,
        private readonly Measurements $measurements,
        private readonly TaxReplacement $taxReplacement,
        private readonly ProductOriginEnum $origin,
        private readonly UnitTypeEnum $unitType,
        private readonly ProductDescription $productDescription
    ) {
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return (string) $this->slug;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function getBrand(): Brand
    {
        return $this->brand;
    }

    public function getWarranty(): int
    {
        return $this->warranty;
    }

    public function getMeasurements(): Measurements
    {
        return $this->measurements;
    }

    public function getTaxReplacement(): TaxReplacement
    {
        return $this->taxReplacement;
    }

    public function getOrigin(): ProductOriginEnum
    {
        return $this->origin;
    }

    public function getUnitType(): UnitTypeEnum
    {
        return $this->unitType;
    }

    public function getProductDescription(): ProductDescription
    {
        return $this->productDescription;
    }
}