<?php

declare(strict_types=1);

namespace App\Domain\Enums;

enum ProductOriginEnum: string
{
    case ONE = '1 - Estrangeira - Importação direta, exceto a indicada no código 6';
    case TWO = '2 - Estrangeira - Adquirida no mercado interno, exceto a indicada no código 7';
    case THREE = '3 - Nacional, mercadoria ou bem com Conteúdo de Importação superior a 40% e inferior ou igual a 70%';
    case FOUR = '4 - Nacional, cuja produção tenha sido feita em conformidade com os processos produtivos básico que tratam as legislações citadas nos Ajustes';
    case FIVE = '5 - Nacional, mercadoria ou bem com Conteúdo de Importação inferior ou igual a 40%';
    case SIX = '6 - Estrangeira - Importação direta, sem similar nacional, constante em lista da CAMEX';
    case SEVEN = '7 - Estrangeira - Adquirida no mercado interno, sem similar nacional, constante em lista da CAMEX';
    case EIGHT = '8 - Nacional, mercadoria ou bem com Conteúdo de Importação superior a 70%';
}