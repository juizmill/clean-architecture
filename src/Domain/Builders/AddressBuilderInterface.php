<?php

declare(strict_types=1);

namespace App\Domain\Builders;

interface AddressBuilderInterface
{
    public function buildAddress(
        string $cep,
        string $street,
        string $number,
        string $district,
        string $city,
        string $state,
        ?string $complement
    ): void;
}