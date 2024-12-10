<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function getByIdAsync(string $id): Model;

    public function addAsync($entity): void;
}
