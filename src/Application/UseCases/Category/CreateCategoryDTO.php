<?php

declare(strict_types=1);

namespace App\Application\UseCases\Category;

class CreateCategoryDTO
{
    public string $name;
    public string $slug;
    public ?string $description;
}