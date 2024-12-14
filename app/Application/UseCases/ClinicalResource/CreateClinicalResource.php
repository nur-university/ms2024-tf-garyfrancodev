<?php

namespace App\Application\UseCases\ClinicalResource;

class CreateClinicalResource
{
    public function __construct(
        public string $name,
        public int $age,
        public string $email
    ) {}
}
