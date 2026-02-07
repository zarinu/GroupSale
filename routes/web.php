<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CartController,
    CategoryController,
    GroupSaleController,
    GroupSaleJoinController,
    HomeController,
    OrderController,
    PaymentController,
    ProductController,
    ProfileController,
    Admin\DashboardController as AdminDashboardController,
    Admin\UsersController as AdminUsersController,
    WalletController};

/**
 * The General Routes
 * --------------------------------------------------------------------------------------------------------
 */
require __DIR__.'/auth.php';

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

// Carts
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::delete('/remove/{item}', [CartController::class, 'remove'])->name('remove');
});

// common routes
Route::get('/about', function () { return view('pages.misc.about'); });
Route::get('/blog/show', function () { return view('pages.blogs.show'); });
Route::get('/blog', function () { return view('pages.blogs.index'); });
Route::get('/cart', function () { return view('pages.cart.index'); });

// Categories
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])
    ->name('category.show');

Route::get('/search', function () { return 'صفحه جستجو'; })->name('search');
Route::get('/forbidden', function () { abort(403); });

/**
 * Auth Needed Routes for users
 * --------------------------------------------------------------------------------------------------------
 */
Route::middleware('auth')->group(function () {
    // داشبورد
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // پروفایل
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // فروش گروهی
    Route::post('/group-sales/{groupSale}/join', [GroupSaleJoinController::class, 'confirm'])
        ->name('group-sales.join');
    Route::post('/group-sales/{groupSale}/process', [GroupSaleJoinController::class, 'process'])
        ->name('group-sales.process');

    // سفارش‌ها
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::post('/create', [OrderController::class, 'store'])->name('store');
        Route::get('/{order}', [OrderController::class, 'show'])->name('show');
    });

    // پرداخت
    Route::prefix('payment')->name('payment.')->group(function () {
        Route::post('/wallet', [PaymentController::class, 'payWithWallet'])->name('wallet');
        Route::post('/gateway', [PaymentController::class, 'payWithGateway'])->name('gateway');
        Route::get('/callback', [PaymentController::class, 'callback'])->name('callback');
    });

    // کیف پول
    Route::prefix('wallet')->name('wallet.')->group(function () {
        Route::get('/', [WalletController::class, 'index'])->name('index');
        Route::post('/charge', [WalletController::class, 'charge'])->name('charge');
    });
});

/**
 * Admin Routes
 * --------------------------------------------------------------------------------------------------------
 */
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/', [AdminDashboardController::class, 'index']);

        // Users Management
        Route::prefix('users')->controller(AdminUsersController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/grid', 'grid')->name('users.grid');
            Route::get('/create', 'create');
            Route::post('/store', 'store');
            Route::prefix('{user}')->group(function() {
                Route::get('/edit', 'edit');
                Route::post('/update', 'update');
                Route::get('/delete', 'delete');
            });
        });
    });
