<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'phone' => 'required|string|unique:customers,phone|max:12',
            'email' => 'required|email|unique:customers|max:255|email',
            'username' => 'required|string|unique:customers,username|max:50',
            'password' => 'required|string|min:6'
        ];
    }

}
