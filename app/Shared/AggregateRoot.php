<?php

namespace App\Shared;

abstract class AggregateRoot extends Entity
{
    protected function __construct(?string $id = null)
    {
        parent::__construct($id);
    }

    protected function __constructDefault(): void
    {
        parent::__construct(null);
    }
}
