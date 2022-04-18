<?php

namespace App\Domain\ValueObjects;

interface ValidationValueObjectInterface
{
    public function isValid(): bool;
}