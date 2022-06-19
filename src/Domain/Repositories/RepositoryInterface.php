<?php

namespace App\Domain\Repositories;

use App\Domain\ValueObjects\Uuid;

interface RepositoryInterface
{
    public function findAll(): array;

    public function findByUuid(Uuid $uuid): mixed;
}