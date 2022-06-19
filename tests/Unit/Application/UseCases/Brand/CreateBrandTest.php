<?php

declare(strict_types=1);

use App\Application\UseCases\Brand\BrandService;
use App\Application\UseCases\Brand\InputBrandDTO;
use App\Infra\Repository\InMemory\InMemoryBrandRepository;

test('Deve ser capaz de criar nova marca', function () {
    $dto = new InputBrandDTO();
    $dto->name = 'test 1';
    $dto->slug = 'test 1';
    $dto->active = false;

    $repository = new InMemoryBrandRepository();

    $createBrand = new BrandService($repository);
    $createBrand->create($dto);

    $this->assertCount(1, $repository->findAll());

    $createBrand->create($dto);

    $this->assertCount(2, $repository->findAll());
});