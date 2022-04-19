<?php

declare(strict_types=1);

use App\Application\UseCases\Brand\CreateBrand;
use App\Application\UseCases\Brand\CreateBrandDTO;
use App\Infra\Repository\InMemory\InMemoryBrandRepository;

test('Deve ser capaz de criar nova marca', function () {
    $dto = new CreateBrandDTO();
    $dto->name = 'test 1';
    $dto->slug = 'test 1';
    $dto->active = false;

    $repository = new InMemoryBrandRepository();

    $createBrand = new CreateBrand($repository);
    $createBrand->run($dto);

    $this->assertCount(1, $repository->findAll());

    $createBrand->run($dto);

    $this->assertCount(2, $repository->findAll());
});