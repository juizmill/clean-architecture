<?php

declare(strict_types=1);

use App\Domain\ValueObjects\ProductDescription;

test('Deve criar uma instancia da descrição do produto', function () {
    $productDescription = new ProductDescription(
        'short description',
        'long description',
        'technical description',
        'includedItem description'
    );

    $this->assertSame('short description', $productDescription->getShort());
    $this->assertSame('long description', $productDescription->getLong());
    $this->assertSame('technical description', $productDescription->getTechnical());
    $this->assertSame('includedItem description', $productDescription->getIncludedItem());
});