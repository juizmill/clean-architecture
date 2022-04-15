<?php

use App\Application\UseCases\Category\CreateCategory;
use App\Application\UseCases\Category\CreateCategoryDTO;
use App\Infra\Repository\InMemory\InMemoryCategoryRepository;

test('Deve ser capaz de criar novas categoria', function () {
    $dto = new CreateCategoryDTO();
    $dto->name = 'test 1';
    $dto->description = 'test 1 description';

    $repository = new InMemoryCategoryRepository();

    $createCategory = new CreateCategory($repository);
    $createCategory->run($dto);

    $this->assertCount(1, $repository->findAll());

    $createCategory->run($dto);

    $this->assertCount(2, $repository->findAll());
});