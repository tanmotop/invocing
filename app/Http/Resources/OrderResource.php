<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'sn' => $this->sn,
            'total_price' => $this->total_price,
            'buyer' => $this->buyer,
            'remark' => $this->remark,
            'items' => OrderItemResource::collection($this->whenLoaded('items')),
            'created_at' => optional($this->created_at)->toDateTimeString()
        ];
    }
}
