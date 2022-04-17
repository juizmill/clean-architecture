<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

class Ie
{
    public function __construct(private readonly ?string $ie = null)
    {
        if (!is_null($this->isValid()) && !$this->isValid()) {
            throw new \DomainException('Inscrição estadual é inválida.');
        }
    }

    private function isValid(): bool
    {
        $ie = str_replace(['.', '-', '/', '\/'], '', (string)$this->ie);
        if (strlen($ie) < 8 || strlen($ie) > 14) {
            return false;
        }

        return is_numeric($ie);
    }

    public function __toString(): string
    {
        return str_replace(['.', '-', '/', '\/'], '', (string)$this->ie);
    }
}