<?php

namespace App\Interfaces\Http\Controllers;

use App\Domain\ValueObjects\Email;
use Exception;
use Illuminate\Http\JsonResponse;

class PatientController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $email = new Email('test');
        } catch (Exception $e) {
            return $e->getMessageResponse();
        }

        return response()->json(['message' => 'Hello, World!']);
    }
}
