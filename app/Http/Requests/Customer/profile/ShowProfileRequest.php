<?php

namespace App\Http\Requests\Customer\profile;

use Illuminate\Foundation\Http\FormRequest;

class ShowProfileRequest extends FormRequest
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

            'customer_id' => 'required',

        ];
    }
}
