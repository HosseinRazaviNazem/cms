<?php

namespace App\Http\Resources\user;

use App\Http\Requests\user\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(StoreUserRequest|Request $request): array
    {
        return [
            'message'=>'all Customers',
             'data'=> $this->collection,
        ];
    }
}
