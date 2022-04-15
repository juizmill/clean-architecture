<?php

declare(strict_types=1);

use App\Domain\ValueObjects\Ie;
use App\Domain\Enums\StateEnum;
use App\Domain\ValueObjects\Cep;
use App\Domain\ValueObjects\Uuid;
use App\Domain\Entities\Supplier;
use App\Domain\ValueObjects\Cnpj;
use App\Domain\ValueObjects\State;
use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\Address;
use App\Domain\Enums\SupplierTypeEnum;
use App\Domain\ValueObjects\SupplierInformation;
use App\Infra\Repository\InMemory\InMemorySupplierRepository;

$uuid = new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2');

test('Deve cadastrar uma fornecedor e retornar uma lista de fornecedores', function () use ($uuid) {
    $cnpj = new Cnpj('71.609.569/0001-05');
    $email = new Email('teste@teste.com');
    $cep = new Cep('79645-040');
    $state = new State(StateEnum::MS);
    $address = new Address($cep, 'Domingos Rimolli', '1500', 'JD. Vendrell', 'Três Lagoas', $state, 'Casa');
    $supplierInformation = new SupplierInformation(5, 10, 700, '#000');
    $ie = new Ie('03039896714');

    $supplier = new Supplier(
        $uuid,
        'Teste',
        $cnpj,
        $email,
        $address,
        $supplierInformation,
        SupplierTypeEnum::DEFAULT,
        $ie
    );

    $repository = new InMemorySupplierRepository();
    $repository->create($supplier);
    $results = $repository->findAll();

    $this->assertCount(1, $results);
    $this->assertSame($supplier, current($results));
});