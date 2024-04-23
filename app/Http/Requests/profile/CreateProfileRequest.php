<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
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

            'first_name' => 'string|profiles,|max:100',
            'last_name' => 'string|profiles,max100',
            'customer_id' => 'required|',
            'address' => 'string',
           'gender' => 'enum',
            'birthday' => 'date',
            'avatar' => 'string',
            'city' => 'string',
            'state' => 'string',
            'status' => 'enum',

        ];
    }
}
