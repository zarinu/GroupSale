<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentItem extends Model
{
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }
}