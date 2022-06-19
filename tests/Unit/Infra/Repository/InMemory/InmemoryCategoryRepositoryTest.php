<?php

declare(strict_types=1);

use App\Domain\Entities\Category;
use App\Domain\ValueObjects\Uuid;
use App\Domain\ValueObjects\Slug;
use App\Infra\Repository\InMemory\InMemoryCategoryRepository;

$uuid = new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2');

test('Deve cadastrar uma categoria', function () use ($uuid) {
    $slug = new Slug('test category');
    $category = new Category($uuid, 'test category', $slug, 'description category');

    $repository = new InMemoryCategoryRepository();
    $repository->create($category);
    $results = $repository->findAll();

    $this->assertSame($category, current($results));
});

test('Deve retornar uma lista de categorias', function () use ($uuid) {
    $slug = new Slug('test category');
    $category = new Category($uuid, 'test category', $slug, 'description category');

    $repository = new InMemoryCategoryRepository();
    $repository->create($category);
    $results = $repository->findAll();

    $this->assertCount(1, $results);
});

test('Deve retornar uma categoria por UUID', function () use ($uuid) {
    $category = new Category(
        new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb1'),
        'test category',
        new Slug('test category'),
        'description category'
    );
    $category2 = new Category(
        new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2'),
        'test category2',
        new Slug('test category2'),
        'description category'
    );
    $category3 = new Category(
        new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2'),
        'test category3',
        new Slug('test category3'),
        'description category'
    );

    $repository = new InMemoryCategoryRepository();
    $repository->create($category);
    $repository->create($category2);
    $repository->create($category3);

    $find = $repository->findByUuid(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2'));

    $this->assertSame('test category2', $find->getName());
});

test('Deve retornar nulo porque não encontrei a categoria por UUID', function () use ($uuid) {
    $category = new Category(
        new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb1'),
        'test category',
        new Slug('test category'),
        'description category'
    );

    $repository = new InMemoryCategoryRepository();
    $repository->create($category);

    $find = $repository->findByUuid(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2'));

    $this->assertNull($find);
});