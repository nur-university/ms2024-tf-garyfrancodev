<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\UseCases\Patient\Command\CreatePatientAddressCommand;
use App\Application\UseCases\Patient\Command\CreatePatientCommand;
use App\Application\UseCases\Patient\Queries\GetAllPatientsQuery;
use App\Infrastructure\Http\Requests\Address\CreatePatientAddressRequest;
use App\Infrastructure\Http\Requests\Patient\CreatePatientRequest;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(title="My First API", version="0.1")
 */
class PatientController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/patient",
     *     tags={"Patients"},
     *     summary="Create a new patient",
     *     description="Handles the creation of a new patient.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"user_id"},
     *             @OA\Property(property="user_id", type="string", example="12345", description="The user ID associated with the patient."),
     *             @OA\Property(property="full_name", type="object",
     *                 @OA\Property(property="first_name", type="string", example="John"),
     *                 @OA\Property(property="last_name", type="string", example="Doe")
     *             ),
     *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com"),
     *             @OA\Property(property="dni", type="string", example="A123456789"),
     *             @OA\Property(property="phone", type="string", example="123456789"),
     *             @OA\Property(property="dob", type="string", format="date", example="2000-05-15"),
     *             @OA\Property(property="gender", type="string", example="male", enum={"male", "female", "other"})
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Patient created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="user_id", type="string", example="12345"),
     *             @OA\Property(property="full_name", type="object",
     *                 @OA\Property(property="first_name", type="string", example="John"),
     *                 @OA\Property(property="last_name", type="string", example="Doe")
     *             ),
     *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input data"
     *     )
     * )
     */
    public function store(CreatePatientRequest $request): JsonResponse
    {
        $command = new CreatePatientCommand($request);
        return $this->commandBus->dispatch($command);
    }

    /**
     * Obtener todos los pacientes.
     *
     * @OA\Get(
     *     path="/api/patient",
     *     tags={"Patients"},
     *     summary="Obtiene todos los pacientes registrados.",
     *     description="Retorna una lista de pacientes.",
     *     operationId="getAllPatients",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de pacientes obtenida exitosamente.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="string", example="1"),
     *                 @OA\Property(property="fullName", type="string", example="Juan Pérez"),
     *                 @OA\Property(property="email", type="string", example="juan.perez@email.com"),
     *                 @OA\Property(property="phone", type="string", example="+1234567890"),
     *                 @OA\Property(property="dob", type="string", format="date", example="1990-01-01"),
     *                 @OA\Property(property="gender", type="string", example="male"),
     *                 @OA\Property(property="dni", type="string", example="12345678"),
     *                 @OA\Property(property="userId", type="string", example="user_123"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Solicitud incorrecta",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error en el servidor",
     *     )
     * )
     */
    public function index(): JsonResponse {
        $command = new GetAllPatientsQuery();
        return $this->commandBus->dispatch($command);
    }

    /**
     * @OA\Post(
     *     path="/api/patient/address",
     *     tags={"Patients"},
     *     summary="Create a new address for patient",
     *     description="Handles the creation of a new address.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="patient_id", type="string", example="12345", description="The patient ID associated with the patient."),
     *             @OA\Property(property="address", type="object",
     *                 @OA\Property(property="street", type="string", example="John"),
     *                 @OA\Property(property="city", type="string", example="Doe"),
     *                 @OA\Property(property="postal_code", type="string", example="Doe")
     *             ),
     *             @OA\Property(property="gps", type="object",
     *                  @OA\Property(property="latitude", type="string", example="John"),
     *                  @OA\Property(property="longitude", type="string", example="Doe")
     *              )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Patient Address created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="user_id", type="string", example="12345"),
     *             @OA\Property(property="full_name", type="object",
     *                 @OA\Property(property="first_name", type="string", example="John"),
     *                 @OA\Property(property="last_name", type="string", example="Doe")
     *             ),
     *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input data"
     *     )
     * )
     */
    public function createPatientAddress(CreatePatientAddressRequest $createPatientAddressRequest): JsonResponse {
        $command = new CreatePatientAddressCommand($createPatientAddressRequest);
        return $this->commandBus->dispatch($command);
    }
}
