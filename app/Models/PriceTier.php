<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceTier extends Model
{
    protected $fillable = ['group_sale_id', 'min_buyers', 'price'];

    public function groupSale()
    {
        return $this->belongsTo(GroupSale::class);
    }
}
