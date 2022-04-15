<?php

declare(strict_types=1);

namespace App\Domain\Enums;

enum PhoneEnum: string
{
    case CELL = 'Celular';
    case COMMERCIAL = 'Commercial';
}