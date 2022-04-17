<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;
use App\Domain\Enums\PhoneEnum;

class Phone
{
    public function __construct(
        private readonly int $ddd,
        private readonly string $number,
        private readonly PhoneEnum $type
    ) {
        if (!preg_match('/^\d{2}/i', (string)$this->ddd)) {
            throw new DomainException('Formato do DDD inválido.');
        }

        if (!preg_match('/^\d{4,5}\-\d{4}/i', $this->number)) {
            throw new DomainException('Formato do telefone inválido.');
        }
    }

    public function __toString(): string
    {
        return "({$this->ddd}) {$this->number}";
    }

    public function getType(): string
    {
        return $this->type->value;
    }
}