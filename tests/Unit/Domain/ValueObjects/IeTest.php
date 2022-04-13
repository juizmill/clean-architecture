<?php

use App\Domain\ValueObjects\Ie;

test('Deve criar uma instância de Ie', function () {
    $ie = new Ie('03039896714');

    $this->assertSame('03039896714', (string)$ie);
});

test('Deve criar uma instância de Ie e retornar sem formatação', function () {
    $ie = new Ie('01.081.630/624-65');

    $this->assertSame('0108163062465', (string)$ie);
});

test('Deve retornar erro caso seja menor que 8 caracteres', function () {
    (new Ie('3039896'));
})->throws(DomainException::class, 'Inscrição estadual é inválida.');

test('Deve retornar erro caso seja maior que 14 caracteres', function () {
    (new Ie('303989692356813'));
})->throws(DomainException::class, 'Inscrição estadual é inválida.');