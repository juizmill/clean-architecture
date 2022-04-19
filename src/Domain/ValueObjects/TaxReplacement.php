<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;

class TaxReplacement
{
    public function __construct(
        private readonly string $cest,
        private readonly string $ncm,
        private readonly ?string $ean = null
    ) {
        if (empty($cest)) {
            throw new DomainException('CEST não pode está em branco.');
        }

        if (empty($ncm)) {
            throw new DomainException('NCM não pode está em branco.');
        }
    }

    public function getCest(): string
    {
        return $this->cest;
    }

    public function getNcm(): string
    {
        return $this->ncm;
    }

    public function getEan(): ?string
    {
        return $this->ean;
    }
}