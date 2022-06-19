<?php

namespace App\Infra\Repository\DoctrineOrm;

use App\Domain\Entities\Brand;
use App\Domain\ValueObjects\Uuid;
use Doctrine\ORM\EntityRepository;
use App\Domain\Repositories\BrandRepositoryInterface;

class DoctrineOrmBrandRepository extends EntityRepository implements BrandRepositoryInterface
{
    public function findAll(): array
    {
        return $this->findBy([]);
    }

    public function findByUuid(Uuid $uuid): mixed
    {
        return $this->findOneBy(['uuid' => $uuid]);
    }

    public function create(Brand $brand): void
    {
        $this->getEntityManager()->persist($brand);
        $this->getEntityManager()->flush();
    }
}