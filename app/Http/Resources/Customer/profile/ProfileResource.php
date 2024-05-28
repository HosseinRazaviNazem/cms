<?php

namespace App\Http\Resources\Customer\profile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name, // Assuming you have a 'phone' attribute
            'last_name' => $this->last_name,
            'customer_id' => $this->customer_id,
            'address' => $this->address,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'avatar' => $this->avatar,
            'city' => $this->city,
            'state' => $this->state,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}
