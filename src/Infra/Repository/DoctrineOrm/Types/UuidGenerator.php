<?php

namespace App\Infra\Repository\DoctrineOrm\Types;

use App\Infra\UuidGenerate;
use Doctrine\ORM\EntityManager;

class UuidGenerator extends \Ramsey\Uuid\Doctrine\UuidGenerator
{
    public function generate(EntityManager $em, $entity)
    {
        return UuidGenerate::generate();
    }
}