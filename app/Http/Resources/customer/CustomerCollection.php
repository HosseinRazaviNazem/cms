<?php

namespace App\Http\Resources\customer;

use App\Http\Requests\customer\StoreCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(StoreCustomerRequest|Request $request): array
    {
        return [
            'message'=>'all Customers',
             'data'=> $this->collection,
        ];
    }
}
