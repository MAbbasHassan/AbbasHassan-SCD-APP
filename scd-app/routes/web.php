<?php

use App\Http\Controllers\WebController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

// Product Routes
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index'); // List all products
    Route::get('/create', [ProductController::class, 'create'])->name('products.create'); // Show create form
    Route::post('/create', [ProductController::class, 'store'])->name('products.store'); // Store a new product
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit'); // Show edit form
    Route::get('/read', [ProductController::class, 'read'])->name('products.read'); // Show edit form
    Route::put('/{id}/edit', [ProductController::class, 'update'])->name('products.update'); // Update an existing product
    Route::get('/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy'); // Delete a product
    Route::get('/view', [ProductController::class, 'view'])->name('products.view'); // View products
    Route::get('/search', [ProductController::class, 'search'])->name('products.search'); // Search functionality
    Route::get('/{id}', [ProductController::class, 'show'])->name('product.details'); // View details of a single product
    Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

});

// User Products Search Route
Route::get('/products/search', [ProductController::class, 'userSearch'])->name('user.products');


Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index'); // Show cart
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add'); // Add to cart
    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove'); // Remove from cart
    Route::patch('/update/{id}', [CartController::class, 'update'])->name('cart.update'); // Update quantity
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout'); // Checkout
    Route::post('/complete-checkout', [CartController::class, 'completeCheckout'])->name('cart.completeCheckout'); // Complete checkout
});






// WebController Routes
Route::controller(WebController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/product', 'shop')->name('shop');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/grocery', 'grocery')->name('grocery');
    Route::get('/skincare', 'skincare')->name('skincare');
    Route::get('/cleaning', 'cleaning')->name('cleaning');
    Route::get('/privacy', 'privacy')->name('privacy');
    Route::get('/terms', 'terms')->name('terms');
    Route::get('/detail', 'p_detail')->name('product.detail'); // Renamed for clarity
    Route::get('/baby', 'baby')->name('baby');
    Route::get('/hygiene', 'hygiene')->name('hygiene');
    Route::get('/health', 'health')->name('health');
    Route::get('/admin', 'admin')->name('admin');
    Route::get('/product', 'pro')->name('product');
});

// Miscellaneous Routes
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Management Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
require __DIR__.'/auth.php';
