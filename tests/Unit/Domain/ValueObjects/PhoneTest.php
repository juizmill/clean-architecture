<?php

declare(strict_types=1);

use App\Domain\Enums\PhoneEnum;
use App\Domain\ValueObjects\Phone;

test('Deve criar uma instancia de telefone com 9 dígitos', function () {
    $phone = new Phone(67, '99225-9401', PhoneEnum::CELL);

    $this->assertSame('(67) 99225-9401', (string)$phone);
    $this->assertSame('Celular', $phone->getType());
});

test('Deve criar uma instancia de telefone com 8 dígitos', function () {
    $phone = new Phone(67, '9225-9401', PhoneEnum::COMMERCIAL);

    $this->assertSame('(67) 9225-9401', (string)$phone);
    $this->assertSame('Commercial', $phone->getType());
});

test('Deve retornar erro de formatação no DDD', function () {
    (new Phone(6, '92259401', PhoneEnum::CELL));
})->throws(DomainException::class, 'Formato do DDD inválido.');

test('Deve retornar erro de formatação', function () {
    (new Phone(67, '92259401', PhoneEnum::CELL));
})->throws(DomainException::class, 'Formato do telefone inválido.');