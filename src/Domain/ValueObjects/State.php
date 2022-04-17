<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use App\Domain\Enums\StateEnum;

class State
{
    public function __construct(private readonly StateEnum $stateEnum)
    {
    }

    public function getName(): string
    {
        return $this->stateEnum->value;
    }

    public function getUf(): string
    {
        return $this->stateEnum->name;
    }
}