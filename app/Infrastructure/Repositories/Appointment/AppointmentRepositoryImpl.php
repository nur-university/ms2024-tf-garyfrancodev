<?php

namespace App\Infrastructure\Repositories\Appointment;

use App\Domain\Repositories\AppointmentRepository;
use App\Infrastructure\Persistence\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Aggregates\Appointment as AppointmentDomain;
use Illuminate\Support\Collection;

class AppointmentRepositoryImpl implements AppointmentRepository
{

    public function getByIdAsync(string $id): Model
    {
        return Appointment::find($id);
    }

    /**
     * @param AppointmentDomain $entity
     */
    public function addAsync($entity): void
    {
        $data = [
            'id' => $entity->getId(),
            'patient_id' => $entity->getPatientId(),
            'nutritionist_id' => $entity->getNutritionistId(),
            'reason' => $entity->getReasonVO()->getValue(),
            'status' => $entity->getStatus()
        ];

        Appointment::create($data);
    }

    public function getAppointmentsByNutritionistId($id): Collection
    {
        return Appointment::where('nutritionist_id', $id)->get();
    }
}
