<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    const MEMBER_PRICE = 0;
    const RETAIL_PRICE = 1;
    const FREE = 2;
    const PERSONAL = 3;
    const OTHER = 4;

    static $priceTypeMap = [
        'member_price' => self::MEMBER_PRICE,
        'retail_price' => self::RETAIL_PRICE,
        'free' => self::FREE,
        'personal' => self::PERSONAL,
        'other' => self::OTHER
    ];

    protected $fillable = [
        'item_id',
        'quantity',
        'price_type',
        'unit_price',
        'total_price'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
