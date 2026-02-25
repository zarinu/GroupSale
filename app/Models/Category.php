<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'sort_order', 'parent_id'];

    public function scopeTree($query)
    {
        return $query->where('is_active', 1)
            ->whereNull('parent_id')
            ->with('childrenRecursive');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
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