<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;

class Email
{
    public function __construct(private string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new DomainException('Email inválido.');
        }

    }

    public function __toString(): string
    {
        return $this->email;
    }
}