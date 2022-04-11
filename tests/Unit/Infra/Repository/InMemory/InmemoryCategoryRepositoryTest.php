<?php

declare(strict_types=1);

use App\Domain\Entities\Category;
use App\Domain\ValueObjects\Uuid;
use App\Infra\Repository\InMemory\InMemoryCategoryRepository;

$uuid = new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2');

test('Deve cadastrar uma categoria e retornar uma lista de categorias', function () use ($uuid) {
    $category = new Category($uuid, 'test category', 'description category');

    $repository = new InMemoryCategoryRepository();
    $repository->create($category);
    $results = $repository->findAll();

    $this->assertCount(1, $results);
    $this->assertSame($category, current($results));
});