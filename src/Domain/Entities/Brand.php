<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use DomainException;
use App\Domain\ValueObjects\Uuid;
use App\Domain\ValueObjects\Slug;

class Brand
{
    public function __construct(
        private readonly Uuid $uuid,
        private readonly string $name,
        private readonly Slug $slug,
        private readonly bool $active = true,
        private readonly ?string $imageUrl = null
    ) {
        if (empty($name)) {
            throw new DomainException('O nome da marca não deve está em branco.');
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

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function isActive(): bool
    {
        return $this->active;
    }
}