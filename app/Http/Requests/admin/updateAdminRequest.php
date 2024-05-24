<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class updateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone' => 'required|string|unique:customers,phone|max:12',
            'email' => 'required|email|unique:admin,email',
            'username' => 'required|string|unique:amin,username|max:50',
            'password' => 'required|string',
        ];
    }
}
