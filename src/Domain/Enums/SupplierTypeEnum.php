<?php

declare(strict_types=1);

namespace App\Domain\Enums;

enum SupplierTypeEnum: string
{
    case DEFAULT = 'Padrão';
    case MARKETPLACE = 'Marketplace';
}