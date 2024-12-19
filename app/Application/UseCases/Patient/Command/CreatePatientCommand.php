<?php

namespace App\Application\UseCases\Patient\Command;

use App\Infrastructure\Http\Requests\Patient\CreatePatientRequest;

class CreatePatientCommand
{
    public function __construct(
        public CreatePatientRequest $createPatientRequest
    )
    {}
}
