<?php

namespace App\Application\UseCases\Supplier\Builder;

use App\Domain\ValueObjects\Ie;
use App\Domain\Enums\StateEnum;
use App\Domain\Enums\PhoneEnum;
use App\Domain\ValueObjects\Cep;
use App\Domain\ValueObjects\Cnpj;
use App\Domain\Entities\Supplier;
use App\Domain\ValueObjects\Uuid;
use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\State;
use App\Domain\ValueObjects\Phone;
use App\Domain\ValueObjects\Address;
use App\Domain\Enums\SupplierTypeEnum;
use App\Domain\ValueObjects\SupplierInformation;
use App\Domain\Builders\SupplierBuilderInterface;

class SupplierBuilder implements SupplierBuilderInterface
{
    private Address $address;
    private Cnpj $cnpj;
    private Email $email;
    private Ie $ie;
    private SupplierInformation $supplierInformation;
    /** @var Phone[] $phones  */
    private array $phones = [];

    public function __construct(
        private Uuid $uuid,
        private string $name,
        private SupplierTypeEnum $type = SupplierTypeEnum::DEFAULT
    ) {
    }

    public function buildAddress(
        string $cep,
        string $street,
        string $number,
        string $district,
        string $city,
        string $state,
        ?string $complement = null
    ): void {
        $cep = new Cep($cep);
        $enum = StateEnum::from($state);
        $state = new State($enum);

        $this->address = new Address($cep, $street, $number, $district, $city, $state, $complement);
    }

    public function buildCnpj(string $cnpj): void
    {
        $this->cnpj = new Cnpj($cnpj);
    }

    public function buildEmail(string $email): void
    {
        $this->email = new Email($email);
    }

    public function buildIe(?string $ie = null): void
    {
        $this->ie = new Ie($ie);
    }

    public function buildSupplierInformation(
        int $deadline,
        int $margin,
        int $minimumBilling = 0,
        ?string $color = null
    ): void {
        $this->supplierInformation = new SupplierInformation($deadline, $margin, $minimumBilling, $color);
    }

    public function buildPhones(array $phones): void
    {
        if (!empty($phones)) {
            foreach ($phones as $phone) {
                $ddd = (int) $phone['ddd'];
                $number = (string) $phone['number'];
                $type = PhoneEnum::from($phone['type']);
                $this->phones[] = new Phone($ddd, $number, $type);
            }
        }
    }

    public function getSupplier(): Supplier
    {
        $supplier = new Supplier(
            $this->uuid,
            $this->name,
            $this->cnpj,
            $this->email,
            $this->address,
            $this->supplierInformation,
            $this->type,
            $this->ie
        );

        foreach ($this->phones as $phone) {
            $supplier->addPhone($phone);
        }

        return $supplier;
    }
}