<?php

namespace App\Infra\Repository\DoctrineOrm\Types;

use Doctrine\DBAL\Types\Type;
use App\Domain\ValueObjects\Slug;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class SlugType extends Type
{

    /**
     * @throws DoctrineOrmTypeExceptions
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null || $value === '') {
            throw new DoctrineOrmTypeExceptions('Slug is null');
        }

        if ($value instanceof Slug) {
            return $value;
        }

        return new Slug($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return (string) $value;
    }

    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        // Built-in helper function for getting platform independent DDL
        return $platform->getVarcharTypeDeclarationSQL($column);
    }

    public function getName()
    {
        return 'slug';
    }
}