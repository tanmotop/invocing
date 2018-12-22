<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseRecord extends Model
{
    protected $fillable = ['boxes', 'per_box', 'quantity', 'purchase_price', 'member_price', 'retail_price', 'created_at'];

    //
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
