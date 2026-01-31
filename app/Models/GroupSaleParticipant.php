<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupSaleParticipant extends Model
{
    public function groupSale()
    {
        return $this->belongsTo(GroupSale::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}