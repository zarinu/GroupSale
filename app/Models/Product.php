<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Product extends Model
{
    protected $fillable = ['name','en_name','slug','short_description','price','status','description',
        'category_id', 'is_active','is_featured','is_group_buy','sale_price','stock','track_stock'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function attributeValues()
    {
        return $this->belongsToMany(
            AttributeValue::class,
            'product_attribute_values'
        )->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getCreatedAtFaAttribute()
    {
//        return Jalalian::fromDateTime($this->created_at)->format('Y/m/d');
        return Jalalian::fromDateTime($this->created_at)->format('%d %B %Y');
    }

    public function thumbnail() {
        if($this->has_thumbnail) {
            return '/media/products/' . $this->id . '/thumbnail.jpg';
        }
        return '/media/products/no-image.jpeg';
    }

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_group_buy' => 'boolean',
        'track_stock' => 'boolean',
    ];
}
