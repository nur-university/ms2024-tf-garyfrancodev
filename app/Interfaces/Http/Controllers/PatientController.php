<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\UseCases\ClinicalResource\CreateClinicalResource;
use App\Domain\Events\ClinicalResourceAdded;
use App\Domain\ValueObjects\Email;
use App\Infrastructure\Http\Requests\Patient\CreatePatientRequest;
use Exception;
use Illuminate\Http\JsonResponse;

class PatientController extends Controller
{
    public function store(CreatePatientRequest $request): JsonResponse
    {
        return response()->json();
    }

    public function index(): JsonResponse
    {
        $command = new CreateClinicalResource("", 1, "");
        try {
            $result = $this->commandBus->dispatch($command);
            error_log($result);
            event(new ClinicalResourceAdded());
            $email = new Email('test');
        } catch (Exception $e) {
            return $e->getMessageResponse();
        }

        return response()->json(['message' => 'Hello, World!']);
    }
}
