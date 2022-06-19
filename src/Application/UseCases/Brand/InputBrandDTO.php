<?php

declare(strict_types=1);

namespace App\Application\UseCases\Brand;

class InputBrandDTO
{
    public string $name;
    public string $slug;
    public bool $active = true;
    public ?string $imageUrl = null;
}