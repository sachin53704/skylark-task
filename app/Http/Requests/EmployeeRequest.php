<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        if ($this->id) {
            return [
                'name' => 'required',
                'email' => 'required|unique:users,email,' . $this->id,
                'mobile' => 'required',
                'age' => 'required',
                'position' => 'required',
                'password' => 'required'
            ];
        } else {
            return [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'mobile' => 'required',
                'age' => 'required',
                'position' => 'required',
                'password' => 'nullable'
            ];
        }
    }
}
