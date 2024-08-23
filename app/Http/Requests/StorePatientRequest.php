<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'family_history' => 'required|boolean',
            'history_of_smoking' => 'required|boolean',
            'email' => 'required|unique:patients',
            'phone_number' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Full Name is required.',
            'place_of_birth.required' => 'Place of Birth is required.',
            'date_of_birth.required' => 'Date of Birth is required.',
            'family_history.required' => 'Family History is required.',
            'history_of_smoking.required' => 'History of Smoking is required.',
            'email.required' => 'Email is required.',
            'email.unique' => 'Email is already registered.',
            'phone_number.required' => 'Phone Number is required.',
            'password.required' => 'Password is required.',
        ];
    }
}
