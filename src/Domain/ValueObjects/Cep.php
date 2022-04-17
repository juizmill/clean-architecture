<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;

class Cep
{
    public function __construct(private readonly string $cep)
    {
        if (!preg_match('/^[\d]{5}-[\d]{3}/i', $this->cep)) {
            throw new DomainException('Formato do CEP inválido.');
        }
    }

    public function __toString(): string
    {
        return $this->cep;
    }
}