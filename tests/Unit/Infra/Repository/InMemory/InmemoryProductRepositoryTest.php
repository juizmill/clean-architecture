<?php

declare(strict_types=1);

use App\Domain\Entities\Brand;
use App\Domain\Entities\Product;
use App\Domain\ValueObjects\Uuid;
use App\Domain\ValueObjects\Slug;
use App\Domain\Entities\Category;
use App\Domain\Enums\UnitTypeEnum;
use App\Domain\Enums\ProductOriginEnum;
use App\Domain\ValueObjects\Measurements;
use App\Domain\ValueObjects\TaxReplacement;
use App\Domain\ValueObjects\ProductDescription;
use App\Infra\Repository\InMemory\InMemoryProductRepository;

$product = function (Uuid $uuid, string $name): Product
{
    $category = new Category($uuid, 'Category Test', new Slug('Category Test'), 'Description test');
    $brand = new Brand($uuid, 'Brand Test', new Slug('Brand Test'), true, 'URL-IMAGE');
    $measurements = new Measurements(1, 2, 3, 4);
    $taxReplacement = new TaxReplacement('123CEST', '123NCM', '123EAN');
    $productDescription = new ProductDescription(
        'short description',
        'long description',
        'technical description',
        'includedItem description'
    );

    return new Product(
        $uuid,
        $name,
        new Slug('Product Test'),
        $category,
        $brand,
        12,
        $measurements,
        $taxReplacement,
        ProductOriginEnum::FIVE,
        UnitTypeEnum::CX,
        $productDescription
    );
};

test('Deve cadastrar um produto', function () use ($product) {
    $uuid = new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2');
    $product = $product($uuid, 'Product test');

    $repository = new InMemoryProductRepository();
    $repository->create($product);
    $results = $repository->findAll();

    $this->assertSame($product, current($results));
});

test('Deve retornar uma lista de produtos', function () use ($product) {
    $uuid = new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2');
    $product = $product($uuid, 'Product test');

    $repository = new InMemoryProductRepository();
    $repository->create($product);
    $results = $repository->findAll();

    $this->assertCount(1, $results);
});

test('Deve retornar um produto por UUID', function () use ($product) {
    $originalProduct = $product;
    $product = $originalProduct(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb1'), 'Product test');
    $product2 = $originalProduct(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2'), 'Product test2');
    $product3 = $originalProduct(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb3'), 'Product test3');

    $repository = new InMemoryProductRepository();
    $repository->create($product);
    $repository->create($product2);
    $repository->create($product3);

    $find = $repository->find(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2'));

    $this->assertSame('Product test2', $find->getName());
});

test('Deve retornar nulo por não encontrou o produto por UUID', function () use ($product) {
    $originalProduct = $product;
    $product = $originalProduct(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb1'), 'Product test');

    $repository = new InMemoryProductRepository();
    $repository->create($product);

    $find = $repository->find(new Uuid('a9aa2164-c62f-4cb6-b40b-0c64e99c4bb2'));

    $this->assertNull($find);
});