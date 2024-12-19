<?php

namespace App\Application\UseCases\Patient\Command;

use App\Domain\Factories\PatientFactory;
use App\Domain\Repositories\PatientRepository;

use App\Shared\UnitOfWork;
use Illuminate\Http\JsonResponse;

class CreatePatientCommandHandler
{
    private PatientRepository $patientRepository;
    private UnitOfWork $unitOfWork;

    /**
     * @param PatientRepository $patientRepository
     * @param UnitOfWork $unitOfWork
     */
    public function __construct(PatientRepository $patientRepository, UnitOfWork $unitOfWork)
    {
        $this->patientRepository = $patientRepository;
        $this->unitOfWork = $unitOfWork;
    }


    public function handle(CreatePatientCommand $command): JsonResponse
    {
        $createPatientRequest = $command->createPatientRequest;
        $data = [
            'user_id' => $createPatientRequest->input('user_id'),
            'full_name' => $createPatientRequest->input('full_name'),
            'email' => $createPatientRequest->input('email'),
            'dni' => $createPatientRequest->input('dni'),
            'dob' => $createPatientRequest->input('dob'),
            'gender' => $createPatientRequest->input('gender'),
            'phone' => $createPatientRequest->input('phone'),
        ];
        $patient = PatientFactory::create($data);
        $model = null;

        $this->unitOfWork->execute(function () use (&$patient, &$model) {
            $model = $this->patientRepository->addAsync($patient);
            $this->unitOfWork->addDomainEvents($patient->getDomainEvents());
        });

        return response()->json(["data" => $model]);
    }
}
