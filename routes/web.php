<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Public Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/service', [PageController::class, 'service'])->name('service');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/products/{product}', [PageController::class, 'show'])->name('show');

// Admin Routes
Route::prefix('admin')
    ->middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Product Management
        Route::post('/products', [AdminController::class, 'store'])->name('admin.products.store');
        Route::put('/products/{product}', [AdminController::class, 'update'])->name('admin.products.update');
        Route::delete('/products/{product}', [AdminController::class, 'destroy'])->name('admin.products.destroy');
    });

// Profile Management (default from Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
