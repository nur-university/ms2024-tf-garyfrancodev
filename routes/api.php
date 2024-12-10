<?php
use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\PatientController;
use App\Interfaces\Http\Controllers\QueriesController;

Route::get('/patient', [PatientController::class, 'index']);
Route::get('/queries', [QueriesController::class, 'index']);

