<?php

namespace App\Shared;

interface UnitOfWork
{
    public function beginTransaction(): void;

    public function commit(): void;

    public function rollback(): void;

    public function execute(callable $callback): mixed;

    public function addDomainEvents(array $events): void;

    public function dispatchDomainEvents(): void;
}
