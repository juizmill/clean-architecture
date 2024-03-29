<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use DomainException;
use App\Domain\ValueObjects\Uuid;
use App\Domain\ValueObjects\Slug;

class Category
{
    public function __construct(
        private readonly Uuid $uuid,
        private readonly string $name,
        private readonly Slug $slug,
        private readonly ?string $description = null
    ) {
        if (empty($this->name)) {
            throw new DomainException(message: 'O nome da categoria não deve está em branco.');
        }
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return (string) $this->slug;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}