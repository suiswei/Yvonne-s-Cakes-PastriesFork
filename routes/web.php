<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomePageController,
    RegisterPageController,
    LoginPageController,
    CatalogPageController,
    ProductDetailsPageController,
    CartPageController,
    CheckoutPageController,
    MyOrdersPageController,
    ProfilePageController,
    PaluwaganPageController,
    AdminDashboardController,
    AdminOrdersController,
    AdminSalesReportController,
    AdminUsersController,
    AdminPaluwaganController,
    AdminInventoryController
};

// ------------------- USER PAGES -------------------
Route::get('/', [HomePageController::class, 'index'])->name('home');

// Registration Routes
Route::get('/register', function () {
    return view('user.RegisterPage');
})->name('register');
Route::post('/register', [RegisterPageController::class, 'store'])->name('register.store');

// Login Routes
Route::get('/login', [LoginPageController::class, 'index'])->name('login');
Route::post('/login', [LoginPageController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginPageController::class, 'logout'])->name('logout');


Route::get('/catalog', [CatalogPageController::class, 'index'])->name('catalog');
Route::get('/product/{id}', [ProductDetailsPageController::class, 'show'])->name('product.details');
Route::get('/cart', [CartPageController::class, 'index'])->name('cart');
Route::get('/checkout', [CheckoutPageController::class, 'index'])->name('checkout');
Route::resource('orders', MyOrdersPageController::class);
Route::get('/profile', [ProfilePageController::class, 'index'])->name('profile');
Route::get('/paluwagan', [PaluwaganPageController::class, 'index'])->name('paluwagan');

// ------------------- ADMIN PAGES -------------------
Route::prefix('admin')->group(function() {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/orders', [AdminOrdersController::class, 'index'])->name('admin.orders');
    Route::get('salesreport', [AdminSalesReportController::class, 'index'])->name('admin.salesreport');

    Route::get('/users', [AdminUsersController::class, 'index'])->name('admin.users');
    Route::get('/users/{id}', [AdminUsersController::class, 'show'])->name('admin.users.show');
    Route::post('/users/create-admin', [AdminUsersController::class, 'storeAdmin'])->name('admin.users.storeAdmin');

    Route::get('/paluwagan', [AdminPaluwaganController::class, 'index'])->name('admin.paluwagan');
    
    Route::get('/inventory', [AdminInventoryController::class, 'index']) ->name('admin.inventory');
    Route::post('/inventory/store', [InventoryController::class, 'store'])->name('inventory.store');
});
