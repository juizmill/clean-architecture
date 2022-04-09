<?php

declare(strict_types=1);

use App\Domain\Entities\Category;
use App\Domain\ValueObjects\Uuid;

$uuid = new Uuid('60b9e9e5-40b7-4805-a23f-f5af1ad89803');

test('Cria instancia de categoria e retorna dados esperados', function () use ($uuid) {
    $category = new Category($uuid, 'Test', 'Description test');

    $this->assertSame($uuid, $category->getUuid());
    $this->assertEquals('Test', $category->getName());
    $this->assertEquals('Description test', $category->getDescription());
});

test('Deve retornar erro caso o nome esteja em branco', function () use ($uuid) {
    $category = new Category($uuid, '');
})->throws(DomainException::class, 'O nome da categoria não deve está em branco.');