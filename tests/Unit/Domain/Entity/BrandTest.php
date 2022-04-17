<?php

declare(strict_types=1);

use App\Domain\Entities\Brand;
use App\Domain\Entities\Category;
use App\Domain\ValueObjects\Uuid;
use App\Domain\ValueObjects\Slug;

$uuid = new Uuid('60b9e9e5-40b7-4805-a23f-f5af1ad89803');

test('Cria instancia de marca e retorna dados esperados', function () use ($uuid) {
    $slug = new Slug('Test');
    $brand = new Brand($uuid, 'Test', $slug, true, 'URL-IMAGE');

    $this->assertSame($uuid, $brand->getUuid());
    $this->assertSame('test', $brand->getSlug());
    $this->assertEquals('Test', $brand->getName());
    $this->assertTrue($brand->isActive());
    $this->assertEquals('URL-IMAGE', $brand->getImageUrl());
});

test('Deve retornar erro caso o nome esteja em branco', function () use ($uuid) {
    $slug = new Slug('Test');
    $brand = new Category($uuid, '', $slug);
})->throws(DomainException::class, 'O nome da categoria não deve está em branco.');