<?php

namespace App\Application\UseCases\Brand;

use App\Domain\ValueObjects\Uuid;

class OutputBrandDTO extends InputBrandDTO
{
    public Uuid $uuid;
}