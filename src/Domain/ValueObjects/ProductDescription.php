<?php

namespace App\Domain\ValueObjects;

use DomainException;

class ProductDescription implements ValidationValueObjectInterface
{
    protected string $error;
    protected array $messages = [
        'short' => 'Descrição curta não pode está em branco.',
        'long' => 'Descrição longo não pode está em branco.',
        'technical' => 'Descrição técnica não pode está em branco.',
        'includedItem' => 'Descrição itens incluso não pode está em branco.',
    ];

    public function __construct(
        private readonly string $short,
        private readonly string $long,
        private readonly string $technical,
        private readonly string $includedItem
    ) {
        if (!$this->isValid()) {
            throw new DomainException($this->error);
        }
    }

    public function getShort(): string
    {
        return $this->short;
    }

    public function getLong(): string
    {
        return $this->long;
    }

    public function getTechnical(): string
    {
        return $this->technical;
    }

    public function getIncludedItem(): string
    {
        return $this->includedItem;
    }

    public function isValid(): bool
    {
        if (empty($this->short)) {
            $this->error = $this->messages['short'];
            return false;
        }

        if (empty($this->long)) {
            $this->error = $this->messages['long'];
            return false;
        }

        if (empty($this->technical)) {
            $this->error = $this->messages['technical'];
            return false;
        }

        if (empty($this->includedItem)) {
            $this->error = $this->messages['includedItem'];
            return false;
        }

        return true;
    }
}