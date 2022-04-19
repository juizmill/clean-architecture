<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

class ProductDescription
{
    public function __construct(
        private readonly string $short,
        private readonly string $long,
        private readonly string $technical,
        private readonly string $includedItem
    ) {
    }

    public function getShort(): string
    {
        return $this->short;
    }

    public function getLong(): string
    {
        return $this->long;
    }

    public function getTechnical(): string
    {
        return $this->technical;
    }

    public function getIncludedItem(): string
    {
        return $this->includedItem;
    }
}