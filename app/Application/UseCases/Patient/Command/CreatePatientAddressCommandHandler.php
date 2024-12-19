<?php

namespace App\Application\UseCases\Patient\Command;

use App\Domain\Factories\AddressFactory;
use App\Domain\Repositories\PatientRepository;
use App\Shared\UnitOfWork;
use Illuminate\Http\JsonResponse;

class CreatePatientAddressCommandHandler
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


    public function handle(CreatePatientAddressCommand $command): JsonResponse
    {
        $createPatientAddressRequest = $command->createPatientAddressRequest;
        $data = [
            "patient_id" => $createPatientAddressRequest->input('patient_id'),
            "address" => $createPatientAddressRequest->input('address'),
            "gps" => $createPatientAddressRequest->input("gps")
        ];

        $address = AddressFactory::create($data);
        $model = null;

        $this->unitOfWork->execute(function () use (&$address, &$model) {
            $model = $this->patientRepository->createPatientAddress($address);

            $this->unitOfWork->addDomainEvents($address->getDomainEvents());
        });

        return response()->json(["data" => $model]);
    }
}
