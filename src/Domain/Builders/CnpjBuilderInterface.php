<?php

declare(strict_types=1);

namespace App\Domain\Builders;

interface CnpjBuilderInterface
{
    public function buildCnpj(string $cnpj): void;
}