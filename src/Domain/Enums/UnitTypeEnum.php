<?php

declare(strict_types=1);

namespace App\Domain\Enums;

enum UnitTypeEnum: string
{
    case UN = 'Unidade';
    case CX = 'Caixa';
    case PC = 'Pacote';
    case BS = 'Bolsa';
}