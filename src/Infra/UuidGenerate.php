<?php

declare(strict_types=1);

namespace App\Infra;

use App\Domain\ValueObjects\Uuid;
use Ramsey\Uuid\Uuid as UuidRamsey;
use App\Domain\ValueObjects\UuidGeneratorInterface;

class UuidGenerate implements UuidGeneratorInterface
{
    public static function generate(): Uuid
    {
        $uuid = UuidRamsey::uuid4()->toString();

        return new Uuid($uuid);
    }

    public static function fromString(string $uui): Uuid
    {
        return new Uuid($uui);
    }
}