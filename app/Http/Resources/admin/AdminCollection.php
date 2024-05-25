<?php

namespace App\Http\Resources\admin;




use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */

    public function toArray(Request $request): array

    {
        return [
            'message' => 'all Admins',
            'data' => $this->collection,
        ];
    }
}
