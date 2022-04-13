<?php

declare(strict_types=1);

use App\Domain\ValueObjects\SupplierInformation;

test('Deve retornar as informações do fornecedor válida', function () {

    $supplierInformation = new SupplierInformation(
        deadline:  5,
        margin: 10,
        minimumBilling: 700,
        color: '#000'
    );

    $this->assertSame(5, $supplierInformation->getDeadline());
    $this->assertSame(10, $supplierInformation->getMargin());
    $this->assertSame(700, $supplierInformation->getMinimumBilling());
    $this->assertSame('#000', $supplierInformation->getColor());
});

test('Deve retornar erro ao informar uma cor inválida', function () {

    $supplierInformation = new SupplierInformation(
        deadline:  5,
        margin: 10,
        minimumBilling: 700,
        color: '$000'
    );
})->throws(DomainException::class, 'Cor não é um hexadecimal válido.');

test('Deve retornar Zero em minimumBilling e nulo em color', function () {

    $supplierInformation = new SupplierInformation(
        deadline:  5,
        margin: 10
    );

    $this->assertSame(0, $supplierInformation->getMinimumBilling());
    $this->assertNull($supplierInformation->getColor());
});