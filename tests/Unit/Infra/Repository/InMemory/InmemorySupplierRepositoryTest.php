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

$supplier = function (Uuid $uuid, string $name): Supplier {
    $cnpj = new Cnpj('71.609.569/0001-05');
    $email = new Email('teste@teste.com');
    $cep = new Cep('79645-040');
    $state = new State(StateEnum::MS);
    $address = new Address($cep, 'Domingos Rimolli', '1500', 'JD. Vendrell', 'Três Lagoas', $state, 'Casa');
    $supplierInformation = new SupplierInformation(5, 10, 700, '#000');
    $ie = new Ie('03039896714');

    return new Supplier(
        $uuid,
        $name,
        $cnpj,
        $email,
        $address,
        $supplierInformation,
        SupplierTypeEnum::DEFAULT,
        $ie
    );
};


test('Deve cadastrar uma fornecedor', function () use ($supplier) {
    $uuid = new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2');
    $supplier = $supplier($uuid, 'Teste');

    $repository = new InMemorySupplierRepository();
    $repository->create($supplier);
    $results = $repository->findAll();

    $this->assertSame($supplier, current($results));
});

test('Deve retornar uma lista de fornecedores', function () use ($supplier) {
    $uuid = new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2');
    $supplier = $supplier($uuid, 'Teste');

    $repository = new InMemorySupplierRepository();
    $repository->create($supplier);
    $results = $repository->findAll();

    $this->assertCount(1, $results);
});

test('Deve retornar um fornecedor por UUID', function () use ($supplier) {
    $originalSupplier = $supplier;
    $supplier = $originalSupplier(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb1'), 'Teste');
    $supplier2 = $originalSupplier(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2'), 'Teste2');
    $supplier3 = $originalSupplier(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb3'), 'Teste3');

    $repository = new InMemorySupplierRepository();
    $repository->create($supplier);
    $repository->create($supplier2);
    $repository->create($supplier3);

    $find = $repository->findByUuid(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2'));

    $this->assertSame('Teste2', $find->getName());
});

test('Deve retornar nulo porque não encontrou o fornecedor por UUID', function () use ($supplier) {
    $originalSupplier = $supplier;
    $supplier = $originalSupplier(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb1'), 'Teste');

    $repository = new InMemorySupplierRepository();
    $repository->create($supplier);

    $find = $repository->findByUuid(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2'));

    $this->assertNull($find);
});