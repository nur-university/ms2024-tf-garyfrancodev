<?php

namespace App\Application\UseCases\Appointment\Command;

use App\Infrastructure\Http\Requests\Appointment\CreateAppointmentRequest;

class CreateAppointmentCommand
{
    public function __construct(
        public CreateAppointmentRequest $createAppointmentRequest
    ) {}
}
