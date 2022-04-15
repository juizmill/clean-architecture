<?php

declare(strict_types=1);

use App\Domain\Enums\StateEnum;
use App\Domain\ValueObjects\Cep;
use App\Domain\ValueObjects\State;
use App\Domain\ValueObjects\Address;

test('Deve ser capas de criar uma instancia de endereço', function () {
    $cep = new Cep('79645-040');
    $state = new State(StateEnum::MS);
    $address = new Address($cep, 'Domingos Rimolli', '1500', 'JD. Vendrell', 'Três Lagoas', $state, 'Casa');

    $this->assertSame((string) $cep, (string)$address->getCep());
    $this->assertSame('Domingos Rimolli', $address->getStreet());
    $this->assertSame('1500', $address->getNumber());
    $this->assertSame('JD. Vendrell', $address->getDistrict());
    $this->assertSame('Três Lagoas', $address->getCity());
    $this->assertSame('Mato Grosso do Sul', $address->getState()->getName());
    $this->assertSame('Casa', $address->getComplement());
});