<?php

declare(strict_types=1);

namespace App\Application\UseCases\Supplier;

class CreateSupplierDTO
{
    public string $name;
    public string $cnpj;
    public string $email;
    public string $cep;
    public string $street;
    public string $number;
    public string $district;
    public string $city;
    public string $state;
    public int $deadline;
    public int $margin;
    public int $minimumBilling = 0;
    public string $type;
    public ?string $complement = null;
    public ?string $ie = null;
    public ?string $color = null;
    protected array $phones = [];

    public function addPhone(int $ddd, string $number, string $type)
    {
        $this->phones[] = [ 'ddd' => $ddd, 'number' => $number, 'type' => $type ];
    }

    public function getPhones(): array
    {
        return $this->phones;
    }
}