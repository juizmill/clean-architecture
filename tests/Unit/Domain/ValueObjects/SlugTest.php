<?php

declare(strict_types=1);

use App\Domain\ValueObjects\Slug;

test('Deve gerar uma Slug valida', function () {
    $slug = new Slug('Teste de slug');
    $slug1 = new Slug('Hoje tem manutenção');
    $slug2 = new Slug('História de 2 amigos com um laço.');

    $this->assertSame('teste-de-slug', (string) $slug);
    $this->assertSame('hoje-tem-manutencao', (string) $slug1);
    $this->assertSame('historia-de-2-amigos-com-um-laco', (string) $slug2);
});

test('Deve gerar erro de validação', function () {
    (new Slug(''));
})->throws(DomainException::class, 'Slug não pode está em branco.');