<?php

declare(strict_types=1);

namespace App\Domain\Builders;

interface EmailBuilderInterface
{
    public function buildEmail(string $email): void;
}