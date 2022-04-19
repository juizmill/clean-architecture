<?php

declare(strict_types=1);

use App\Domain\ValueObjects\Measurements;

test('Deve criar uma instancia de medidas', function () {
    $measurements = new Measurements(1, 2, 3, 4);

    $this->assertSame(1, $measurements->getWidth());
    $this->assertSame(2, $measurements->getHeight());
    $this->assertSame(3, $measurements->getLength());
    $this->assertSame(4, $measurements->getWeight());
});

test('Deve retornar erro caso a largura seja negativa', function () {
    (new Measurements(-1, 2, 3, 4));
})->throws(DomainException::class, 'As medias não são válidas');

test('Deve retornar erro caso a altura seja negativa', function () {
    (new Measurements(1, -2, 3, 4));
})->throws(DomainException::class, 'As medias não são válidas');

test('Deve retornar erro caso o comprimento seja negativ0', function () {
    (new Measurements(1, 2, -3, 4));
})->throws(DomainException::class, 'As medias não são válidas');

test('Deve retornar erro caso o peso seja negativo', function () {
    (new Measurements(1, 2, 3, -4));
})->throws(DomainException::class, 'As medias não são válidas');