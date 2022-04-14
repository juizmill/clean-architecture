<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Ie;
use App\Domain\ValueObjects\Cnpj;
use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\Phone;
use App\Domain\ValueObjects\Address;
use App\Domain\Enums\SupplierTypeEnum;
use App\Domain\ValueObjects\SupplierInformation;

class Supplier
{
    private array $phones = [];

    public function __construct(
        private string $name,
        private Cnpj $cnpj,
        private Email $email,
        private Address $address,
        private SupplierInformation $supplierInformation,
        private SupplierTypeEnum $type = SupplierTypeEnum::DEFAULT,
        private ?Ie $ie = null
    ) {
    }

    public function getType(): string
    {
        return $this->type->value;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCnpj(): Cnpj
    {
        return $this->cnpj;
    }

    public function getIe(): ?Ie
    {
        return $this->ie;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getSupplierInformation(): SupplierInformation
    {
        return $this->supplierInformation;
    }

    public function addPhone(Phone $phone): static
    {
        $this->phones[] = $phone;
        return $this;
    }

    /** @return Phone[] */
    public function getPhones(): array
    {
        return $this->phones;
    }
}