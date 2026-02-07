<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupSale extends Model
{
    protected $fillable = [
        'product_id', 'start_time', 'end_time', 'status',
        'min_participants', 'max_participants',
        'current_price', 'final_price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(GroupSaleOrder::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function participants()
    {
        return $this->hasMany(GroupSaleParticipant::class)->orderByDesc('min_buyers');
    }

    public function priceTiers()
    {
        return $this->hasMany(GroupSalePrice::class);
    }
}
