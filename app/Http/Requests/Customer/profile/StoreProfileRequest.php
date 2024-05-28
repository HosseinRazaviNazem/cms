<?php

namespace App\Http\Requests\Customer\profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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

            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'customer_id' => 'required|string|unique:profiles',
            'address' => 'required|string',
            'gender' => 'required|required|in:MALE,FEMALE,OTHER',
            'birthday' => 'required|date',
            'avatar' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',

        ];
    }
}
