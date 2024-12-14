<?php

namespace App\Application\UseCases\Appointment\Queries;

class GetAppointmentsByNutritionistIdQuery
{
    public function __construct(
        public string $nutritionistId
    ) {}
}
