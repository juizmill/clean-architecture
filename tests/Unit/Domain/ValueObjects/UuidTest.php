<?php

declare(strict_types=1);

use App\Domain\ValueObjects\Uuid;

test('Deve retornar uma UUID válido', function () {

    $id = 'aa3e314c-13a7-43a4-ab8a-654f7fd775eb';
    $uuid = new Uuid($id);

    $this->assertSame($id, (string)$uuid);
});

test('Deve retornar uma exceção, UUID inválido', function () {
    $id = 'aa3e314c-13a7-43a4-ab8a-654f7fd775eb5667';
    $uuid = new Uuid($id);
})->throws(DomainException::class, 'UUID informado não é válido.');