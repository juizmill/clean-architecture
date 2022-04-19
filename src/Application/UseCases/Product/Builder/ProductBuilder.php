<?php

declare(strict_types=1);

namespace App\Application\UseCases\Product\Builder;

use App\Infra\UuidGenerate;
use App\Domain\Entities\Brand;
use App\Domain\Entities\Product;
use App\Domain\ValueObjects\Uuid;
use App\Domain\ValueObjects\Slug;
use App\Domain\Entities\Category;
use App\Domain\Enums\UnitTypeEnum;
use App\Domain\Enums\ProductOriginEnum;
use App\Domain\ValueObjects\Measurements;
use App\Domain\ValueObjects\TaxReplacement;
use App\Domain\ValueObjects\ProductDescription;
use App\Domain\Builders\ProductBuilderInterface;

class ProductBuilder implements ProductBuilderInterface
{
    private ProductDescription $productDescription;
    private Measurements $measurements;
    private TaxReplacement $taxReplacement;

    public function __construct(
        private readonly string $name,
        private readonly string $slug,
        private readonly int $warranty,
        private readonly Category $category,
        private readonly Brand $brand,
        private readonly string $origin,
        private readonly string $unitType
    ) {
    }

    public function buildMeasurements(int $width = 0, int $height = 0, int $length = 0, int $weight = 0): void
    {
        $this->measurements = new Measurements($width, $height, $length, $weight);
    }

    public function buildTaxReplacement(string $cest, string $ncm, ?string $ean = null): void
    {
        $this->taxReplacement = new TaxReplacement($cest, $ncm, $ean);
    }

    public function buildProductDescription(string $short, string $long, string $technical, string $includedItem): void
    {
        $this->productDescription = new ProductDescription($short, $long, $technical, $includedItem);
    }

    public function getProduct(): Product
    {
        $uuid = UuidGenerate::generate();
        $origin = ProductOriginEnum::from($this->origin);
        $unitType = UnitTypeEnum::from($this->unitType);
        $slug = new Slug($this->slug);
        return new Product(
            $uuid,
            $this->name,
            $slug,
            $this->category,
            $this->brand,
            $this->warranty,
            $this->measurements,
            $this->taxReplacement,
            $origin,
            $unitType,
            $this->productDescription
        );
    }
}