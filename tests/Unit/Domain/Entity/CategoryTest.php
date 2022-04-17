<?php

declare(strict_types=1);

use App\Domain\Entities\Category;
use App\Domain\ValueObjects\Uuid;
use App\Domain\ValueObjects\Slug;

$uuid = new Uuid('60b9e9e5-40b7-4805-a23f-f5af1ad89803');

test('Cria instancia de categoria e retorna dados esperados', function () use ($uuid) {
    $slug = new Slug('Test');
    $category = new Category($uuid, 'Test', $slug, 'Description test');

    $this->assertSame($uuid, $category->getUuid());
    $this->assertSame('test', $category->getSlug());
    $this->assertEquals('Test', $category->getName());
    $this->assertEquals('Description test', $category->getDescription());
});

test('Deve retornar erro caso o nome esteja em branco', function () use ($uuid) {
    $slug = new Slug('Test');
    $category = new Category($uuid, '', $slug);
})->throws(DomainException::class, 'O nome da categoria não deve está em branco.');