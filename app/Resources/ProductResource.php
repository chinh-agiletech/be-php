<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'prd_name' => $this->prd_name,
            'prd_slug' => $this->prd_slug,
            'prd_description' => $this->prd_description,
            'prd_price' => $this->prd_price,
            'prd_discount' => $this->prd_discount,
            'prd_image' => $this->prd_image,
            'category_id' => $this->category_id,
        ];
    }
}
