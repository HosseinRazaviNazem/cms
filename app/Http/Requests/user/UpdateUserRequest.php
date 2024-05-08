<?php

namespace App\Http\Requests\user;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|unique:customers,username|max:50',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|unique:customers,phone|max:12',
            'password' => 'required|string',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'password' => Hash::make($this->input('password')),
        ]);
    }


}
