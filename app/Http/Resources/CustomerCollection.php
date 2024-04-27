<?php

namespace App\Http\Resources;

use App\Http\Requests\customer\CreateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(CreateCustomerRequest|Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($customer) {
                return [
                    'id' => $customer->id,
                    'phone' => $customer->phone, // Assuming you have a 'phone' attribute
                    'email' => $customer->email,
                    'username' => $customer->username,
                ];
            })
        ];
    }
}
