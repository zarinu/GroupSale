<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\GroupSale;
use App\Models\GroupSaleOrder;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function dashboard()
    {
        return view('pages.dashboard.index');
    }
}
