<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;

use App\Models\Room;
use App\Http\Controllers\SocialAuthController;

Route::get('/', function () {
    $rooms = Room::take(3)->latest()->get();
    return view('home', compact('rooms'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Socialite Routes
Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback'])->name('google.callback');

route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
route::get('/rooms/{id}', [RoomController::class, 'show'])->name('rooms.show');
Route::middleware('auth')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
});

Route::post('/xendit/webhook', [BookingController::class, 'webhook'])->name('xendit.webhook');

// Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('rooms', AdminRoomController::class);
});

require __DIR__.'/auth.php';
