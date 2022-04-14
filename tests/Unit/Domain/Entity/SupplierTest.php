<?php

declare(strict_types=1);

use App\Domain\Enums\StateEnum;
use App\Domain\ValueObjects\Ie;
use App\Domain\Enums\PhoneEnum;
use App\Domain\ValueObjects\Cep;
use App\Domain\Entities\Supplier;
use App\Domain\ValueObjects\Cnpj;
use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\State;
use App\Domain\ValueObjects\Phone;
use App\Domain\ValueObjects\Address;
use App\Domain\Enums\SupplierTypeEnum;
use App\Domain\ValueObjects\SupplierInformation;

test('Deve ser capas de criar uma instancia de Fornecedor', function () {
    $cnpj = new Cnpj('71.609.569/0001-05');
    $email = new Email('teste@teste.com');
    $cep = new Cep('79645-040');
    $state = new State(StateEnum::MS);
    $address = new Address($cep, 'Domingos Rimolli', '1500', 'Casa', 'JD. Vendrell', 'Três Lagoas', $state);
    $supplierInformation = new SupplierInformation(5, 10, 700, '#000');
    $ie = new Ie('03039896714');

    $supplier = new Supplier(
        'Teste',
        $cnpj,
        $email,
        $address,
        $supplierInformation,
        SupplierTypeEnum::DEFAULT,
        $ie
    );

    $this->assertEquals(0, count($supplier->getPhones()));

    $phoneCell = new Phone(67, '99225-9401', PhoneEnum::CELL);
    $phoneCommercial = new Phone(67, '99225-9401', PhoneEnum::COMMERCIAL);

    $supplier->addPhone($phoneCell)->addPhone($phoneCommercial);

    $this->assertEquals(2, count($supplier->getPhones()));

    $this->assertSame('Teste', $supplier->getName());
    $this->assertSame('71.609.569/0001-05', (string)$supplier->getCnpj());
    $this->assertSame('teste@teste.com', (string)$supplier->getEmail());
    $this->assertSame('Domingos Rimolli', $supplier->getAddress()->getStreet());
    $this->assertSame(700, $supplier->getSupplierInformation()->getMinimumBilling());
    $this->assertSame('Padrão', $supplier->getType());
    $this->assertSame('03039896714', (string)$supplier->getIe());
});