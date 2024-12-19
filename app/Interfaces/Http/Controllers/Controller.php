<?php

namespace App\Interfaces\Http\Controllers;

use App\Infrastructure\Core\CommandBus;

abstract class Controller
{
    protected CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }
}