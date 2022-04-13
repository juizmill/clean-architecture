<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

class Address
{
    public function __construct(
        private Cep $cep,
        private string $street,
        private string $number,
        private string $complement,
        private string $district,
        private string $city,
        private State $state
    ) {
    }

    public function getCep(): Cep
    {
        return $this->cep;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getComplement(): string
    {
        return $this->complement;
    }

    public function getDistrict(): string
    {
        return $this->district;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): State
    {
        return $this->state;
    }
}