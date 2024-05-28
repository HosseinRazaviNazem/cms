<?php

<<<<<<< Updated upstream:app/Http/Resources/admin/ProductResource.php
namespace App\Http\Resources\admin;
=======
namespace App\Http\Resources\Customer\product;
>>>>>>> Stashed changes:app/Http/Resources/Customer/product/ProductResource.php

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
        //        return parent::toArray($request);
    }
}
