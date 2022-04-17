<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;

class SupplierInformation
{
    public function __construct(
        private readonly int $deadline,
        private readonly int $margin,
        private readonly int $minimumBilling = 0,
        private readonly ?string $color = null
    ) {
        if (!is_null($this->color) && !preg_match('/#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/i', $this->color)) {
            throw new DomainException('Cor não é um hexadecimal válido.');
        }
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function getDeadline(): int
    {
        return $this->deadline;
    }

    public function getMargin(): int
    {
        return $this->margin;
    }

    public function getMinimumBilling(): int
    {
        return $this->minimumBilling;
    }
}