<?php

declare(strict_types=1);

namespace App\Domain\Builders;

interface IeBuilderInterface
{
    public function buildIe(?string $ie = null): void;
}