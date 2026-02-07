<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $breadcrumbs = $category->ancestors()->push($category);

        return view('categories.show', compact('category', 'breadcrumbs'));
    }
}
