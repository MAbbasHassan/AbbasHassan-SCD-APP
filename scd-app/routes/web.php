<?php
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


Route::get('categoriess', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('categoriess/create', [App\Http\Controllers\CategoryController::class, 'create']);
Route::post('categoriess/create', [App\Http\Controllers\CategoryController::class, 'store']);
Route::get('categoriess/{id}/edit', [App\Http\Controllers\CategoryController::class, 'edit']);
Route::put('categoriess/{id}/edit', [App\Http\Controllers\CategoryController::class, 'update']);
Route::get('categoriess/{id}/delete', [App\Http\Controllers\CategoryController::class, 'destroy']);

Route::controller(WebController::class)->group(function () {
    Route::get('', 'home');
    Route::get('/product', 'shop');
    Route::get('/contact', 'contact');
    Route::get('/grocery', 'grocery');
    Route::get('/skincare', 'skincare');
    Route::get('/cleaning', 'cleaning');
    Route::get('/privacy', 'privacy');
    Route::get('/terms', 'terms');
    Route::get('/detail', 'p_detail');
    Route::get('/baby', 'baby');
    Route::get('/hygiene', 'hygiene');
    Route::get('/health', 'health');
    Route::get('/admin', 'admin');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
