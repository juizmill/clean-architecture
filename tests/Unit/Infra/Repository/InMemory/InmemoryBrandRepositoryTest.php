<?php

declare(strict_types=1);

use App\Domain\Entities\Brand;
use App\Domain\ValueObjects\Uuid;
use App\Domain\ValueObjects\Slug;
use App\Infra\Repository\InMemory\InMemoryBrandRepository;

$uuid = new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2');

test('Deve cadastrar uma marca', function () use ($uuid) {
    $slug = new Slug('test marca');
    $brand = new Brand($uuid, 'test marca', $slug);

    $repository = new InMemoryBrandRepository();
    $repository->create($brand);
    $results = $repository->findAll();

    $this->assertCount(1, $results);
});

test('Deve retornar uma lista de marcas', function () use ($uuid) {
    $slug = new Slug('test marca');
    $brand = new Brand($uuid, 'test marca', $slug);

    $repository = new InMemoryBrandRepository();
    $repository->create($brand);
    $results = $repository->findAll();

    $this->assertCount(1, $results);
});

test('Deve retornar uma marcas por UUID', function () use ($uuid) {
    $brand = new Brand(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb1'), 'test marca', new Slug('test marca'));
    $brand2 = new Brand(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2'), 'test marca2', new Slug('test marca2'));
    $brand3 = new Brand(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb3'), 'test marca3', new Slug('test marca3'));

    $repository = new InMemoryBrandRepository();
    $repository->create($brand);
    $repository->create($brand2);
    $repository->create($brand3);

    $find = $repository->findByUuid(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2'));

    $this->assertSame('test marca2', $find->getName());
});

test('Deve retornar nulo porque não encontrou marcas por UUID', function () use ($uuid) {
    $brand = new Brand(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb1'), 'test marca', new Slug('test marca'));

    $repository = new InMemoryBrandRepository();
    $repository->create($brand);

    $find = $repository->findByUuid(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2'));

    $this->assertNull($find);
});