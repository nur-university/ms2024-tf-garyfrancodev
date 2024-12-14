<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\UseCases\Appointment\Command\CreateAppointmentCommand;
use App\Application\UseCases\Appointment\Queries\GetAppointmentsByNutritionistIdQuery;
use App\Infrastructure\Http\Requests\Appointment\CreateAppointmentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
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
