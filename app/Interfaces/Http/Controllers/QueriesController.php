<?php

namespace App\Interfaces\Http\Controllers;

use Illuminate\Http\JsonResponse;

class QueriesController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(['message' => 'Hello, World!']);
    }
}
