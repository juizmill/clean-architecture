<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Ie;
use App\Domain\ValueObjects\Cnpj;
use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\Phones;
use App\Domain\ValueObjects\Address;
use App\Domain\ValueObjects\SupplierInformation;

class Supplier
{
    public function __construct(
        private string $type,
        private string $name,
        private Cnpj $cnpj,
        private Ie $ie,
        private Email $email,
        private Phones $phoneNumber,
        private Address $address,
        private SupplierInformation $supplierInformation
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCnpj(): Cnpj
    {
        return $this->cnpj;
    }

    public function getIe(): Ie
    {
        return $this->ie;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPhoneNumber(): Phones
    {
        return $this->phoneNumber;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getSupplierInformation(): SupplierInformation
    {
        return $this->supplierInformation;
    }
}