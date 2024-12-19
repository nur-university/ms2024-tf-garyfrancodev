<?php

namespace App\Infrastructure\Repositories\Patient;

use App\Domain\Repositories\PatientRepository;
use App\Infrastructure\Persistence\Models\Address;
use App\Infrastructure\Persistence\Models\Patient;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PatientRepositoryImpl implements PatientRepository
{
    public function getByIdAsync(string $id): Model
    {
        return Patient::find($id);
    }

    public function addAsync($entity): Model
    {
        $data = [
            'id' => $entity->getId(),
            'user_id' => $entity->getUserId(),
            'full_name' => $entity->getFullName()->getFullName(),
            'dob' => $entity->getDob()->getValue(),
            'gender' => $entity->getGender()->getValue(),
            'phone' => $entity->getPhone(),
            'dni' => $entity->getDni()->getDni(),
            'email' => $entity->getEmail()->getEmail()
        ];

        return Patient::create($data);
    }

    public function getAllPatients(): Collection
    {
        return Patient::all();
    }

    public function createPatientAddress($entity): Model
    {
        $data = [
            'id' => $entity->getId(),
            'patient_id' => $entity->getPatientId(),
            'address' => $entity->getAddressVO()->getValue(),
            'gps' => $entity->getGpsVO()->toJson()
        ];

        return Address::create($data);
    }
}
