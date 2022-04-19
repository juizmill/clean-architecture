<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;

class Slug
{
    public function __construct(private readonly string $slug)
    {
        if (empty($slug)) {
            throw new DomainException('Slug não pode está em branco.');
        }
    }

    protected function slugify($text, string $divider = '-'): string
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        return strtolower($text);
    }

    public function __toString(): string
    {
        return $this->slugify($this->slug);
    }
}