<?php

namespace App\Http\Resources;

use App\Models\OrderItem;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'item_name' => $this->item->name,
            'quantity' => $this->quantity,
            'price_type' => array_flip(OrderItem::$priceTypeMap)[$this->price_type],
            'unit_price' => $this->unit_price,
            'total_price' => $this->total_price
        ];
    }
}
