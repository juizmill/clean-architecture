<?php

declare(strict_types=1);

namespace App\Domain\Builders;

use App\Domain\Entities\Supplier;

interface SupplierBuilderInterface extends
    CnpjBuilderInterface,
    EmailBuilderInterface,
    AddressBuilderInterface,
    IeBuilderInterface
{
    public function buildSupplierInformation(
        int $deadline,
        int $margin,
        int $minimumBilling = 0,
        ?string $color = null
    ): void;

    public function getSupplier(): Supplier;
}