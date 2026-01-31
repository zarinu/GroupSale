<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['sidebar_item'] = 'dashboard';
        $data['orders_count'] = Order::count();
        $data['users_count'] = User::count();
        $data['comments_count'] = Review::count();
        return view('admin.dashboard.index', $data);
    }
}
