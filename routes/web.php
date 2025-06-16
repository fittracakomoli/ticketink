<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PurchaseController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/tiketsaya', function () {
    return view('tiketsaya');
});

<<<<<<< HEAD
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
=======
Route::get('/tickets', [EventController::class, 'show'])->name('event.show');
>>>>>>> 2900649b0efd77e97d2d0190900edf200a018c5c

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/event', [EventController::class, 'index'])->name('event.index');
    Route::post('/event', [EventController::class, 'store'])->name('event.store');

    Route::get('/event/{id}', [EventController::class, 'edit'])->name('event.edit');
    Route::patch('/event/{id}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/checkout/prepare', [PurchaseController::class, 'prepareCheckout'])->name('checkout.prepare');
    Route::get('/checkout', [PurchaseController::class, 'showCheckout'])->name('checkout.show');

    Route::post('/checkout/bayar', [PurchaseController::class, 'bayar'])->name('checkout.bayar');

    Route::get('/tiket-saya', [PurchaseController::class, 'myTickets'])->name('my.tickets');
});

Route::get('/tickets/{slug}', [PurchaseController::class, 'detail'])->name('ticket.detail');

require __DIR__.'/auth.php';
