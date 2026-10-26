<?php

use App\Http\Controllers\BookingAvailabilityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\ContactPageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::view('/', 'home')->name('home');
Route::view('/services', 'services')->name('services');
Route::view('/work', 'work')->name('work');
Route::view('/about', 'about')->name('about');
Route::get('/contact', [ContactPageController::class, 'show'])->name('contact');
Route::post('/contact', [ContactMessageController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');

Route::get('/bookings/services/{service}/availability', [BookingAvailabilityController::class, 'show'])->name('bookings.availability');
Route::post('/bookings', [BookingController::class, 'store'])->middleware('throttle:5,1')->name('bookings.store');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
