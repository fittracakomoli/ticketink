<?php

use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;

Route::get('/', [EventController::class, 'home'])->name('home');

Route::get('/tickets', [EventController::class, 'show'])->name('event.show');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    $adminCount = User::where('role', 'admin')->count(); 
    $userCount = User::count();
    $eventCount = Event::count();


    return view('dashboard', [
        'adminCount' => $adminCount,
        'userCount' => $userCount,
        'eventCount' => $eventCount,
    ]);
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

    Route::post('/api/events/{event}/checkin', [EventController::class, 'checkInAttendee'])->name('api.event.checkin.web'); // Beri nama berbeda jika sudah ada di api.php

    Route::get('/transactions', [PurchaseController::class, 'showTransactions'])->name('transactions.index');
});

Route::get('/tickets/{slug}', [PurchaseController::class, 'detail'])->name('ticket.detail');

require __DIR__.'/auth.php';
