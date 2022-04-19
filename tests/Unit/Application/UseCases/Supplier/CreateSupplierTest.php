<?php

declare(strict_types=1);

use App\Domain\Enums\StateEnum;
use App\Domain\Enums\PhoneEnum;
use App\Domain\Entities\Supplier;
use App\Domain\Enums\SupplierTypeEnum;
use App\Application\UseCases\Supplier\CreateSupplier;
use App\Application\UseCases\Supplier\CreateSupplierDTO;
use App\Infra\Repository\InMemory\InMemorySupplierRepository;

test('Deve ser capaz de criar novas categoria', function () {
    $dto = new CreateSupplierDTO();
    $dto->name = 'test 1';
    $dto->cnpj = '69.980.030/0001-08';
    $dto->email = 'teste@teste.com.br';
    $dto->cep = '79645-040';
    $dto->street = 'Rua 1';
    $dto->number = 'S/N';
    $dto->district = 'JD. Vendrell';
    $dto->city = 'São Paulo';
    $dto->state = StateEnum::SP->value;
    $dto->deadline = 5;
    $dto->margin = 2;
    $dto->minimumBilling = 80000;
    $dto->type = SupplierTypeEnum::DEFAULT->value;
    $dto->complement = 'Casa';
    $dto->ie = '747.569.112.850';
    $dto->color = '#fff';

    $dto->addPhone(67, '99225-9401', PhoneEnum::CELL->value);
    $dto->addPhone(67, '3521-4321', PhoneEnum::COMMERCIAL->value);

    $repository = new InMemorySupplierRepository();

    $createSupplier = new CreateSupplier($repository);
    $createSupplier->run($dto);

    $this->assertCount(1, $repository->findAll());

    $createSupplier->run($dto);

    $this->assertCount(2, $repository->findAll());

    /** @var Supplier $supplier */
    $supplier = current($repository->findAll());

    $this->assertCount(2, $supplier->getPhones());
});