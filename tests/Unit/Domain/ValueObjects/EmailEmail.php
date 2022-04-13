<?php

declare(strict_types=1);

use App\Domain\ValueObjects\Email;

test('Deve ser capas de criar uma instância de email', function () {
    $email1 = new Email('teste@teste.com.br');
    $email2 = new Email('teste@teste.com');
    $email3 = new Email('teste@teste.net');

    $this->assertSame('teste@teste.com.br', (string)$email1);
    $this->assertSame('teste@teste.com', (string)$email2);
    $this->assertSame('teste@teste.net', (string)$email3);
});

test('Deve dar erro de validação de email', function () {
    (new Email('teste'));
})->throws(DomainException::class, 'Email inválido.');

test('Deve dar erro de validação email incompleto', function () {
    (new Email('teste@c'));
})->throws(DomainException::class, 'Email inválido.');