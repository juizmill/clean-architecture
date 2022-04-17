<?php

declare(strict_types=1);

use App\Domain\Entities\Brand;
use App\Domain\ValueObjects\Uuid;
use App\Domain\ValueObjects\Slug;
use App\Infra\Repository\InMemory\InMemoryBrandRepository;

$uuid = new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2');

test('Deve cadastrar uma marca e retornar uma lista de marcas', function () use ($uuid) {
    $slug = new Slug('test marca');
    $brand = new Brand($uuid, 'test marca', $slug);

    $repository = new InMemoryBrandRepository();
    $repository->create($brand);
    $results = $repository->findAll();

    $this->assertCount(1, $results);
    $this->assertSame($brand, current($results));
});