<?php

namespace App\Infrastructure\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class CreatePatientAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'patient_id' => 'required',
            'address' => 'required',
            'gps' => 'required'
        ];
    }
}
