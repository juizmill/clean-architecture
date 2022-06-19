<?php

require_once "vendor/autoload.php";

use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use App\Infra\Repository\DoctrineOrm\Types\UuidType;
use App\Infra\Repository\DoctrineOrm\Types\SlugType;

$paths = [
    __DIR__ . '/src/Infra/Repository/DoctrineOrm/mappings'
];
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_sqlite',
    'path' => __DIR__ . '/data/database.db'
);

$config = ORMSetup::createXMLMetadataConfiguration($paths, $isDevMode);

Type::addType('uuid', UuidType::class);
Type::addType('slug', SlugType::class);

return EntityManager::create($dbParams, $config);