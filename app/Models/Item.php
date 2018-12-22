<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function purchaseRecord()
    {
        return $this->hasMany(PurchaseRecord::class);
    }

    /**
     * @param Builder $builder
     * @param array $ids
     * @return Builder
     */
    public function scopeFetchItems(Builder $builder, array $ids)
    {
        if (!empty($ids)) {
            return $builder->whereIn('id', $ids);
        }
        else {
            return $builder->where('id', -1);
        }
    }
}
