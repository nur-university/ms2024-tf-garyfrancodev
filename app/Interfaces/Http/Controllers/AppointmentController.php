<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\UseCases\Appointment\Command\CreateAppointmentCommand;
use App\Application\UseCases\Appointment\Queries\GetAppointmentsByNutritionistIdQuery;
use App\Infrastructure\Http\Requests\Appointment\CreateAppointmentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/appointment",
     *     tags={"Appointments"},
     *     summary="Create a new appointment",
     *     description="Handles the creation of a new appointment.",
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
    public function store(CreateAppointmentRequest $request): JsonResponse {
        $command = new CreateAppointmentCommand($request);
        return $this->commandBus->dispatch($command);
    }

    public function show(Request $request): JsonResponse {
        return response()->json();
    }

    public function index(Request $request): JsonResponse {
        return response()->json();
    }

    public function update(Request $request): JsonResponse {
        return response()->json();
    }

    public function destroy(Request $request): JsonResponse {
        return response()->json();
    }

    public function getAppointmentsByNutritionistIdQuery(Request $request): JsonResponse {
        error_log('test');
        $id = $request->get('nutritionist_id');
        $command = new GetAppointmentsByNutritionistIdQuery($id);
        return $this->commandBus->dispatch($command);
    }
}
