<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;

class Cnpj
{
    public function __construct(private readonly string $cnpj)
    {
        if (!$this->isValid($this->cnpj)) {
            throw new DomainException('CNPJ é invalido.');
        }

        if (!preg_match('/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/i', $cnpj)) {
            throw new DomainException('Formato do CNPJ é inválido.');
        }
    }

    private function isValid(string $context): bool
    {
        //https://gist.github.com/guisehn/3276302
        // Extrai os números
        $cnpj = preg_replace('/[^0-9]/is', '', $context);

        // Valida tamanho
        if (strlen($cnpj) != 14) {
            return false;
        }

        // Verifica sequência de digitos repetidos. Ex: 11.111.111/111-11
        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

        // Valida dígitos verificadores
        for ($t = 12; $t < 14; $t++) {
            for ($d = 0, $m = ($t - 7), $i = 0; $i < $t; $i++) {
                $d += $cnpj[$i] * $m;
                $m = ($m == 2 ? 9 : --$m);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cnpj[$i] != $d) {
                return false;
            }
        }

        return true;
    }

    public function __toString(): string
    {
        return $this->cnpj;
    }
}