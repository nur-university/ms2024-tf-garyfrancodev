<?php
use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\PatientController;
use App\Interfaces\Http\Controllers\AppointmentController;

Route::post('/patient', [PatientController::class, 'store']);
Route::get('/patient/{id}', [PatientController::class, 'show']);
Route::post('/patient', [PatientController::class, 'index']);
Route::put('/patient/{id}', [PatientController::class, 'update']);
Route::delete('/patient/{id}', [PatientController::class, 'destroy']);

Route::prefix('appointment')->group(function () {

    Route::post('/', [AppointmentController::class, 'store']);
    Route::get('/', [AppointmentController::class, 'index']);

    Route::get('/by-nutritionist', [AppointmentController::class, 'getAppointmentsByNutritionistIdQuery']);

    Route::get('/{id}', [AppointmentController::class, 'show']);
    Route::put('/{id}', [AppointmentController::class, 'update']);
    Route::delete('/{id}', [AppointmentController::class, 'destroy']);
});

