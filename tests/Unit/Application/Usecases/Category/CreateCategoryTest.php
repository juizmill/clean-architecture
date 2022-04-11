<?php

use App\Application\Usecases\Category\CreateCategory;
use App\Application\Usecases\Category\CreateCategoryDTO;
use App\Infra\Repository\InMemory\InMemoryCategoryRepository;

test('Deve ser capaz de criar novas categoria', function () {
    $dto = new CreateCategoryDTO();
    $dto->uuid = '4623d529-67ab-42a0-862a-cff69bc6bde8';
    $dto->name = 'test 1';
    $dto->description = 'test 1 description';

    $repository = new InMemoryCategoryRepository();

    $createCategory = new CreateCategory($repository);
    $createCategory->run($dto);

    $this->assertCount(1, $repository->findAll());

    $createCategory->run($dto);

    $this->assertCount(2, $repository->findAll());
});