<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'name' => $this->name,
            'sn' => $this->sn,
            'stock' => $this->stock,
            'purchase_price' => $this->purchase_price,
            'member_price' => $this->member_price,
            'retail_price' => $this->retail_price,
        ];
    }
}
