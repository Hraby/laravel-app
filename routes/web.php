<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'admin'])->name('dashboard');

Route::prefix('dashboard')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/hotel', [HotelsController::class, 'adminIndex'])->name('dashboard.hotel.index');
    Route::get('/hotel/create', [HotelsController::class, 'create'])->name('dashboard.hotel.create');
    Route::post('/hotel', [HotelsController::class, 'store'])->name('dashboard.hotel.store');
    Route::get('/hotel/{hotel}/edit', [HotelsController::class, 'edit'])->name('dashboard.hotel.edit');
    Route::put('/hotel/{hotel}', [HotelsController::class, 'update'])->name('dashboard.hotel.update');
    Route::delete('/hotel/{hotel}', [HotelsController::class, 'destroy'])->name('dashboard.hotel.destroy');
    Route::get('/reservations', [ReservationController::class, 'index'])->name('dashboard.reservations.index');
});

Route::get('/hotel', [HotelsController::class, 'publicIndex'])->name('hotel.index');
Route::get('/hotel/{slug}', [HotelsController::class, 'show'])->name('hotel.show');

Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
