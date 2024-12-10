<?php

namespace App\Shared;

use Exception;
interface UnitOfWork
{
    /**
     * Commit all changes within the current unit of work.
     *
     * @param array $options Optional parameters for customization.
     * @throws Exception If the commit fails.
     */
    public function commitAsync(array $options = []): void;
}
