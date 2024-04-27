<?php

namespace App\Http\Resources\profile;

use App\Http\Requests\profile\CreateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProfileCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(CreateProfileRequest|Request $request): array
    {
        return [
            'message'=>'all Profiles',
            'data'=> $this->collection,
        ];
        return parent::toArray($request);
    }
}




