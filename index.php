<?php

use App\Domain\Entities\Brand;
use App\Application\UseCases\Brand\BrandService;
use App\Application\UseCases\Brand\InputBrandDTO;
use App\Infra\Repository\DoctrineOrm\DoctrineOrmBrandRepository;

require __DIR__ . '/vendor/autoload.php';

/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = require __DIR__ . '/bootstrap.php';

$dto = new InputBrandDTO();
$dto->name = 'test 1';
$dto->slug = 'test 1';
$dto->active = false;

/** @var DoctrineOrmBrandRepository $repository */
$repository = $entityManager->getRepository(Brand::class);
$brandService = new BrandService($repository);
$brandService->create($dto);

$brands = $brandService->findAll();
$totalBrands = count($brands);

$brandFirst = end($brands);


$uuid = (string)$brandFirst->uuid;

$brand = $brandService->find($uuid);

echo "Total: {$totalBrands}\n";

dd($brand, $brands);