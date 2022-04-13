<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;

class SupplierInformation
{
    public function __construct(
        private int $deadline,
        private int $margin,
        private int $minimumBilling = 0,
        private ?string $color = null
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