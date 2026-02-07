<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\GroupSale;

class ProductController extends Controller
{
    public function show(Product $product, Request $request)
    {
        $category = $product->category;
        $breadcrumbs = $category->ancestors()->push($category);

        $variant = null;
        $groupSale = null;

        // آیا کاربر variant انتخاب کرده؟
        if ($request->filled(['memory', 'color'])) {


            $groupSale = GroupSale::whereHas('productVariant', function ($q) use ($product) {
                $q->where('product_id', $product->id);
            })
                ->where('status', 'active')
                ->where('end_time', '>', now())
                ->with(['priceTiers' => fn ($q) => $q->orderBy('min_buyers')])
                ->first();

            $joined = false;
            $participantsCount = 0;
            $currentTier = null;

            if ($groupSale) {
                $participantsCount = $groupSale->orders()
                    ->where('payment_status', '!=', 'pending')
                    ->count();

                $currentTier = $groupSale->priceTiers
                    ->where('min_buyers', '<=', $participantsCount)
                    ->sortByDesc('min_buyers')
                    ->first();

                if (auth()->check()) {
                    $joined = $groupSale->orders()
                        ->where('user_id', auth()->id())
                        ->exists();
                }
            }
        }

        return view('pages.products.single', compact(
            'breadcrumbs',
            'product',
            'groupSale',
            'variant',
//            'participantsCount',
//            'currentTier',
//            'joined'
        ));
    }

}