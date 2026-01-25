<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupSaleController;
use App\Http\Controllers\GroupSaleJoinController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard2');

Route::get('/gdashboard', [GroupSaleController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/home', [GroupSaleController::class, 'index'])->name('home');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::post('/group-sales/{groupSale}/join', [GroupSaleController::class, 'join'])->middleware('auth')->name('group-sales.join');

Route::middleware('auth')->group(function () {
    Route::post('/group-sales/{groupSale}/join', [GroupSaleJoinController::class, 'confirm'])
        ->name('group-sales.join');

    Route::post('/group-sales/{groupSale}/process', [GroupSaleJoinController::class, 'process'])
        ->name('group-sales.process');
});

Route::get('/search', function () {
    return 'صفحه جستجو';
})->name('search');




Route::get('/about', function () { return view('pages.misc.about'); });
Route::get('/blog/show', function () { return view('pages.blogs.show'); });
Route::get('/blog', function () { return view('pages.blogs.index'); });
Route::get('/cart', function () { return view('pages.cart.index'); });

Route::get('/forbidden', function () {
    abort(403);
});