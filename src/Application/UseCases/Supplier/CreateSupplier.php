<?php

declare(strict_types=1);

namespace App\Application\UseCases\Supplier;

use App\Infra\UuidGenerate;
use App\Domain\Enums\SupplierTypeEnum;
use App\Domain\Repositories\SupplierRepositoryInterface;
use App\Application\UseCases\Supplier\Builder\SupplierBuilder;


class CreateSupplier
{
    public function __construct(private SupplierRepositoryInterface $repository)
    {
    }

    public function run(CreateSupplierDTO $dto): void
    {
        $uuid = UuidGenerate::generate();
        $type = SupplierTypeEnum::from($dto->type);

        $supplierBuilder = new SupplierBuilder($uuid, $dto->name, $type);
        $supplierBuilder->buildCnpj($dto->cnpj);
        $supplierBuilder->buildEmail($dto->email);
        $supplierBuilder->buildIe($dto->ie);
        $supplierBuilder->buildPhones($dto->getPhones());
        $supplierBuilder->buildSupplierInformation(
            $dto->deadline,
            $dto->margin,
            $dto->minimumBilling,
            $dto->color
        );
        $supplierBuilder->buildAddress(
            $dto->cep,
            $dto->street,
            $dto->number,
            $dto->district,
            $dto->city,
            $dto->state,
            $dto->complement
        );

        $supplier = $supplierBuilder->getSupplier();
        $this->repository->create($supplier);
    }
}