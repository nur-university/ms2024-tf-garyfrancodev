<?php

namespace App\Application\UseCases\Patient\Command;

use App\Infrastructure\Http\Requests\Address\CreatePatientAddressRequest;

class CreatePatientAddressCommand
{


    public function __construct(
        public CreatePatientAddressRequest $createPatientAddressRequest
    )
    {}
}
