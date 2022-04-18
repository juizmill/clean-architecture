<?php

namespace App\Domain\ValueObjects;

use DomainException;

class Measurements implements ValidationValueObjectInterface
{
    public function __construct(
        private readonly int $width = 0,
        private readonly int $height = 0,
        private readonly int $length = 0,
        private readonly int $weight = 0
    ) {
        if (!$this->isValid()) {
            throw new DomainException('As medias não são válidas');
        }
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function isValid(): bool
    {
        if ($this->length < 0 || $this->weight < 0 || $this->width < 0 || $this->height < 0) {
            return false;
        }

        return true;
    }
}