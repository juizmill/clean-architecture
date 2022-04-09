<?php

namespace App\Domain\ValueObjects;

interface UuidGeneratorInterface
{
    public static function generate(): Uuid;
}