<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\GroupSale;
use App\Models\GroupSaleOrder;
use Illuminate\Support\Facades\Auth;


class GroupSaleController extends Controller
{
    // صفحه اصلی: لیست محصولات با فروش گروهی
    public function index()
    {
        $products = Product::with('groupSales')->get();
        return view('pages.home', compact('products'));
    }

    // صفحه محصول: نمایش کمپین فعال و سطوح قیمت
    public function show(Product $product)
    {
        $groupSale = $product->groupSales()
            ->where('status', 'active')
            ->with(['priceTiers', 'orders'])
            ->first();

        return view('pages.products.single', compact('product', 'groupSale'));
    }

    // ثبت سفارش در کمپین
    public function join(Request $request, GroupSale $groupSale)
    {
        $user = Auth::user();

        // چک نکنه قبلاً ثبت کرده باشه؟
        $already = GroupSaleOrder::where('user_id', $user->id)
            ->where('group_sale_id', $groupSale->id)
            ->exists();

        if ($already) {
            return redirect()->back()->with('message', 'شما قبلاً در این کمپین شرکت کرده‌اید.');
        }

        // کمپین بازه و ظرفیت داره؟
        if (
            $groupSale->status !== 'active' ||
            now()->lt($groupSale->start_time) ||
            now()->gt($groupSale->end_time) ||
            $groupSale->orders()->count() >= $groupSale->max_participants
        ) {
            return redirect()->back()->with('error', 'امکان پیوستن به این کمپین وجود ندارد.');
        }

        // محاسبه قیمت لحظه‌ای
        $buyersCount = $groupSale->orders()->count() + 1;

        $price = $groupSale->priceTiers()
            ->where('min_buyers', '<=', $buyersCount)
            ->orderByDesc('min_buyers')
            ->first()
            ->price ?? $groupSale->current_price;

        // ذخیره سفارش
        GroupSaleOrder::create([
            'user_id' => $user->id,
            'group_sale_id' => $groupSale->id,
            'initial_price' => $price,
            'final_price' => $price,
            'payment_status' => 'pending',
        ]);

        // قیمت بقیه سفارش هارو کم میکنیم
        GroupSaleOrder::where('group_sale_id', $groupSale->id)
            ->where('payment_status', 'partial')
            ->update(['final_price' => $price]);

        return redirect()->back()->with('message', 'شما با موفقیت به خرید گروهی پیوستید!');
    }

    public function dashboard()
    {
        $orders = auth()->user()->groupSaleOrders()->with('groupSale.product', 'groupSale.orders')->latest()->get();
        return view('gdashboard', compact('orders'));
    }

}
