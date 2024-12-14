<?php

namespace App\Application\UseCases\Appointment\Queries;

use App\Application\UseCases\Appointment\Command\CreateAppointmentCommand;
use App\Domain\Aggregates\Appointment;
use App\Domain\Repositories\AppointmentRepository;
use App\Domain\ValueObjects\ReasonVO;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class GetAppointmentsByNutritionistIdQueryHandler
{
    private AppointmentRepository $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function handle(GetAppointmentsByNutritionistIdQuery $query): JsonResponse
    {
        try {
            $nutritionistId = $query->nutritionistId;
            $data = $this->appointmentRepository->getAppointmentsByNutritionistId($nutritionistId);

            return response()->json([
                "data" => $data
            ]);
        } catch (Exception $e) {
            return $e->getMessageResponse();
        }
    }

}
