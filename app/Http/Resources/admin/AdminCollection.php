<?php

namespace App\Http\Resources\admin;

use App\Http\Requests\admin\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(RegisterRequest|Request $request): array
    {
        return [
            'message' => 'all Admins',
            'data' => $this->collection,
        ];
    }
}
