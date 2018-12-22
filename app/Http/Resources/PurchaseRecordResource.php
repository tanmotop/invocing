<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseRecordResource extends JsonResource
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
            'name' => $this->item->name,
            'boxes' => $this->boxes,
            'per_box' => $this->per_box,
            'quantity' => $this->quantity,
            'purchase_price' => $this->purchase_price,
            'member_price' => $this->member_price,
            'retail_price' => $this->retail_price,
            'created_at' => optional($this->created_at)->toDateTimeString()
        ];
    }
}
