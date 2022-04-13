<?php

declare(strict_types=1);

use App\Domain\Enums\StateEnum;
use App\Domain\ValueObjects\State;

test('Deve ser capas de criar uma instancia', function () {
    $state = new State(StateEnum::SP);
    $this->assertSame('SP', $state->getUf());
    $this->assertSame('São Paulo', $state->getName());
});