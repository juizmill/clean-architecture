<?php

declare(strict_types=1);

namespace App\Application\Usecases\Category;

class CreateCategoryDTO
{
    public string $name;
    public ?string $description;
}