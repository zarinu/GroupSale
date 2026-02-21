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

    protected $casts = [
        'ends_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function participants()
    {
        return $this->hasMany(GroupSaleParticipant::class);
    }

    public function priceTiers()
    {
        return $this->hasMany(GroupSalePrice::class);
    }
}
