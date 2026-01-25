<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'base_price', 'image'];

    public function groupSales()
    {
        return $this->hasMany(GroupSale::class);
    }
}
