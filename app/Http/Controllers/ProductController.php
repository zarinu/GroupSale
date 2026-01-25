<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\GroupSale;
use App\Models\GroupSaleOrder;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $groupSale = $product->groupSales()
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

        return view('pages.products.single', compact(
            'product',
            'groupSale',
            'participantsCount',
            'currentTier',
            'joined'
        ));
    }
}