<?php

declare(strict_types=1);

use App\Domain\ValueObjects\Cnpj;

test('Deve ser capas de criar uma instancia de CNPJ', function () {
    $expected = '47.642.924/0001-55';

    $cpf = new Cnpj($expected);

    $this->assertSame($expected, (string)$cpf);
});

test('Deve retornar erro de CNPJ, formato inválido', function () {
    (new Cnpj('47642924000155'));
})->throws(DomainException::class, 'Formato do CNPJ é inválido.');

test('Deve retornar erro de CNPJ inválido faltando números', function () {
    (new Cnpj('47.642.924/0001'));
})->throws(DomainException::class, 'CNPJ é invalido.');

test('Deve retornar erro de CNPJ inválido', function () {
    (new Cnpj('47.642.924/0001-58'));
})->throws(DomainException::class, 'CNPJ é invalido.');

test('Deve retornar erro de CNPJ números sequencial de 1', function () {
    (new Cnpj('11.111.111/1111-11'));
})->throws(DomainException::class, 'CNPJ é invalido.');