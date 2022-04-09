<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use DomainException;
use App\Domain\ValueObjects\Uuid;

class Category
{
    public function __construct(private Uuid $uuid, private string $name, private ?string $description = null)
    {
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

    public function getDescription(): string
    {
        return $this->description;
    }
}