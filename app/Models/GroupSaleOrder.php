<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupSaleOrder extends Model
{
    protected $fillable = ['group_sale_id', 'user_id', 'initial_price', 'final_price', 'payment_status'];

    public function groupSale()
    {
        return $this->belongsTo(GroupSale::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
