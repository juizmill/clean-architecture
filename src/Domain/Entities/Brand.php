<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Uuid;
use App\Domain\ValueObjects\Slug;

class Brand
{
    public function __construct(
        private readonly Uuid $uuid,
        private readonly string $name,
        private readonly Slug $slug,
        private readonly string $imageUrl,
        private readonly bool $active,
    ) {
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): Slug
    {
        return $this->slug;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function isActive(): bool
    {
        return $this->active;
    }
}