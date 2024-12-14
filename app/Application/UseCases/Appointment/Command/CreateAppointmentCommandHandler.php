<?php

namespace App\Application\UseCases\Appointment\Command;

use App\Domain\Factories\AppointmentFactory;
use App\Domain\Repositories\AppointmentRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CreateAppointmentCommandHandler
{
    private AppointmentRepository $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function handle(CreateAppointmentCommand $command): JsonResponse
    {
        try {
            $createAppointmentRequest = $command->createAppointmentRequest;
            $patientId = $createAppointmentRequest->get('patient_id');
            $nutritionistId = $createAppointmentRequest->get('nutritionist_id');
            $reason = $createAppointmentRequest->get('reason');

            $model = AppointmentFactory::create([
                'patient_id' => $patientId,
                'nutritionist_id' => $nutritionistId,
                'reason' => $reason
            ]);

            DB::beginTransaction();
            $this->appointmentRepository->addAsync($model);

            $events = $model->getDomainEvents();

            for ($i = 0; $i < count($events); $i++) {
                event($events[$i]);
            }

            DB::commit();

            return response()->json([
                'data' => $model->getId()
            ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $e->getMessageResponse();
        }
    }
}
