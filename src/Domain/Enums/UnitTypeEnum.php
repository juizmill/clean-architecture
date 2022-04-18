<?php

namespace App\Domain\Enums;

enum UnitTypeEnum: string
{
    case UN = 'Unidade';
    case CX = 'Caixa';
    case PC = 'Pacote';
    case BS = 'Bolsa';
}