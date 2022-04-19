<?php

declare(strict_types=1);

use App\Domain\Entities\Brand;
use App\Domain\Entities\Product;
use App\Domain\Entities\Category;
use App\Domain\ValueObjects\Uuid;
use App\Domain\ValueObjects\Slug;
use App\Domain\Enums\UnitTypeEnum;
use App\Domain\Enums\ProductOriginEnum;
use App\Domain\ValueObjects\Measurements;
use App\Domain\ValueObjects\TaxReplacement;
use App\Domain\ValueObjects\ProductDescription;

$uuid = new Uuid('60b9e9e5-40b7-4805-a23f-f5af1ad89803');

test('Deve criar instancia de produto e retorna dados esperados', function () use ($uuid) {
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

    $product = new Product(
        $uuid,
        'Product Test',
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

    $this->assertInstanceOf(Uuid::class, $product->getUuid());
    $this->assertSame('Product Test', $product->getName());
    $this->assertSame('product-test', $product->getSlug());
    $this->assertInstanceOf(Category::class, $product->getCategory());
    $this->assertInstanceOf(Brand::class, $product->getBrand());
    $this->assertSame(12, $product->getWarranty());
    $this->assertInstanceOf(Measurements::class, $product->getMeasurements());
    $this->assertInstanceOf(TaxReplacement::class, $product->getTaxReplacement());
    $this->assertSame(ProductOriginEnum::FIVE->value, $product->getOrigin()->value);
    $this->assertSame(UnitTypeEnum::CX->value, $product->getUnitType()->value);
    $this->assertInstanceOf(ProductDescription::class, $product->getProductDescription());
});