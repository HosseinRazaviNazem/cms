<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
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

//            'first_name' => 'required|string|profiles,|max:100',
//            'last_name' => 'required|string|profiles,max100',
//            'customer_id' => 'required|profiles',
//            'address' => 'required|string|profiles',
//            'gender' => 'required|enum|profiles',
//            'birthday' => 'required|date|profiles',
//            'avatar' => 'required|string|profiles',
//            'city' => 'required|string|profiles',
//            'state' => 'required|string|profiles',
//            'status' => 'enum|profiles',

            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'customer_id' => 'required|string|unique:profiles',
            'address' => 'required|string',
            'gender' => 'required|required|in:MALE,FEMALE,OTHER',
            'birthday' => 'required|date',
            'avatar' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'status' => 'in:active,inactive',
        ];
    }
}
