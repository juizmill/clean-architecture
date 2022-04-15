<?php

namespace App\Domain\Repositories;

interface RepositoryInterface
{
    public function findAll(): array;
}