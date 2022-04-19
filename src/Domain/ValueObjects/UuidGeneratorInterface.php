<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

interface UuidGeneratorInterface
{
    public static function generate(): Uuid;

    public static function fromString(string $uui): Uuid;
}