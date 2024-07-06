<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        // $studentId = $this->route('student') ? $this->route('student')->id : null;
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email, {$studentId}',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ];
    }
}
