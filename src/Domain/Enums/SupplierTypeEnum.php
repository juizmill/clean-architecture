<?php

namespace App\Domain\Enums;

enum SupplierTypeEnum: string
{
    case DEFAULT = 'Padrão';
    case MARKETPLACE = 'Marketplace';
}