<?php

declare(strict_types=1);

namespace App\Domain\Builders;

use App\Domain\Entities\Product;

interface ProductBuilderInterface
{
    public function buildMeasurements(
        int $width = 0,
        int $height = 0,
        int $length = 0,
        int $weight = 0
    ): void;

    public function buildTaxReplacement(
        string $cest,
        string $ncm,
        ?string $ean = null
    ): void;

    public function buildProductDescription(
        string $short,
        string $long,
        string $technical,
        string $includedItem
    ): void;

    public function getProduct(): Product;
}