<?php

use App\Domain\ValueObjects\Cep;

test('Deve ser capas de criar instância de CEP', function () {
    $cep = new Cep('79645-040');

    $this->assertSame('79645-040', (string)$cep);
});

test('Deve gerar um erro de CEP inválido', function () {
    (new Cep('79645040'));
})->throws(DomainException::class, 'Formato do CEP inválido.');