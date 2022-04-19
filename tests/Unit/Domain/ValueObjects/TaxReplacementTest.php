<?php

declare(strict_types=1);

use App\Domain\ValueObjects\TaxReplacement;

test('Deve criar uma instancia de substituição fiscal', function () {
    $taxReplacement = new TaxReplacement('123CEST', '123NCM', '123EAN');

    $this->assertSame('123CEST', $taxReplacement->getCest());
    $this->assertSame('123NCM', $taxReplacement->getNcm());
    $this->assertSame('123EAN', $taxReplacement->getEan());
});

test('Deve retornar erro porque CEST está vazio', function () {
    (new TaxReplacement('', '123NCM', '123EAN'));
})->throws(DomainException::class, 'CEST não pode está em branco.');

test('Deve retornar erro porque NCM está vazio', function () {
    (new TaxReplacement('123CEST', '', '123EAN'));
})->throws(DomainException::class, 'NCM não pode está em branco.');