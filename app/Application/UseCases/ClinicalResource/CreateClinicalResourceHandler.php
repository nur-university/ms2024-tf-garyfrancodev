<?php

namespace App\Application\UseCases\ClinicalResource;

use Illuminate\Http\JsonResponse;

class CreateClinicalResourceHandler
{
    public function handle(CreateClinicalResource $command): JsonResponse
    {
        return response()->json([
           'oki' => "test"
        ]);
    }
}
