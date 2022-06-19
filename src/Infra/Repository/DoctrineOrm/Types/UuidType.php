<?php

namespace App\Infra\Repository\DoctrineOrm\Types;



use App\Infra\UuidGenerate;
use Ramsey\Uuid\UuidInterface;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class UuidType extends \Ramsey\Uuid\Doctrine\UuidType
{
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $uuid = parent::convertToPHPValue($value, $platform);
        if ($uuid === null || $uuid === '') {
            return null;
        }

        if ($uuid instanceof UuidGenerate) {
            return $value;
        }

        return UuidGenerate::fromString($uuid->toString());
    }
}