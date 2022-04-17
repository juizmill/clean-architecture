<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;

class Uuid
{
    public function __construct(private readonly string $uuid)
    {
        $regex = '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';
        if (!preg_match($regex, $this->uuid)) {
            throw new DomainException('UUID informado não é válido.');
        }
    }

    public function __toString(): string
    {
        return $this->uuid;
    }
}