<?php

declare(strict_types=1);

namespace App\Application\UseCases\Product;

class CreateProductDTO
{
    public string $name;
    public string $slug;
    public string $uuidCategory;
    public string $uuidBrand;
    public int $warranty;
    public int $width = 0;
    public int $height = 0;
    public int $length = 0;
    public int $weight = 0;
    public string $cest;
    public string $ncm;
    public ?string $ean = null;
    public string $origin;
    public string $unitType;
    public string $short;
    public string $long;
    public string $technical;
    public string $includedItem;
}