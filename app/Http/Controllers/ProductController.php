<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\GroupSale;

class ProductController extends Controller
{
    public function show(Product $product, Request $request)
    {
        $firstOrNot = 'first';
        /**
         * 1. گرفتن attribute_value ها از query string
         */
        $variantValueSlugs = collect($request->query())
            ->except(['page', 'sort'])
            ->values()
            ->filter()
            ->toArray();

        /**
         * 2. فقط اگر کاربر چیزی انتخاب کرده باشد
         * دنبال variant می‌گردیم
         */
        $variant = null;

        if (!empty($variantValueSlugs)) {
            $firstOrNot = 'not';
            $variant = ProductVariant::where('product_id', $product->id)
                ->whereHas('attributeValues', function ($q) use ($variantValueSlugs) {
                    $q->whereIn('slug', $variantValueSlugs);
                }, '=', count($variantValueSlugs))
                ->with(['attributeValues.attribute'])
                ->first();
        }

        /**
         * 3. فروش گروهی فقط وقتی variant داریم
         */
        $groupSale = null;
        $participantsCount = 0;
        $priceTiers = null;
        $joined = false;

        if ($variant) {
            $groupSale = $variant->groupSales()
                ->where('status', 'active')
                ->where('ends_at', '>', now())
                ->with(['priceTiers' => fn ($q) => $q->orderBy('min_buyers')])
                ->first();

            if ($groupSale) {
                $participantsCount = $groupSale->participants()
                    ->where('payment_status', '!=', 'pending')
                    ->count();

                if (auth()->check()) {
                    $joined = $groupSale->participants()
                        ->where('user_id', auth()->id())
                        ->exists();
                }



                $priceTiers = $groupSale->priceTiers()->orderBy('min_buyers')->get()->toArray();
                // اضافه کردن سطح پایه اگر وجود نداشت
                if (!collect($priceTiers)->contains(fn($tier) => $tier['min_buyers'] == 0)) {
                    array_unshift($priceTiers, [
                        'min_buyers' => 0,
                        'price' => $variant->price,
                    ]);
                }
                // پیدا کردن شاخص فعال
                $activeTierIndex = null;
                foreach ($priceTiers as $index => $tier) {
                    if ($participantsCount >= $tier['min_buyers']) {
                        $activeTierIndex = $index; // آخرین Tier که تعداد >= min_buyers
                    }
                }
                // فقط یک کلید is_active اضافه می‌کنیم
                foreach ($priceTiers as $index => &$tier) {
                    $tier['is_active'] = ($index === $activeTierIndex);
                }
            }
        }

        $category = $product->category;
        $breadcrumbs = $category->ancestors()->push($category);
        $product->load('attributeValues.attribute');

        $variantAttributeGroups = $product->variants()
            ->with(['attributeValues.attribute'])
            ->get()
            ->flatMap(fn ($variant) => $variant->attributeValues)
            ->unique('id')
            ->groupBy('attribute_id');

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(6)
            ->get();

        return view('pages.products.single', compact(
            'product',
            'variant',
            'groupSale',
            'participantsCount',
            'priceTiers',
            'joined',
            'breadcrumbs',
            'variantAttributeGroups',
            'firstOrNot',
            'relatedProducts',
        ));
    }
}