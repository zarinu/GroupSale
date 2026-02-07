<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'sort_order', 'parent_id'];

    public static function tree()
    {
        return Category::where('is_active', 1)
            ->whereNull('parent_id')
            ->with('children')
            ->get();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Get all ancestors (for breadcrumb)
     */
    public function ancestors()
    {
        $ancestors = collect();
        $category = $this;

        while ($category->parent) {
            $ancestors->prepend($category->parent);
            $category = $category->parent;
        }

        return $ancestors;
    }

}