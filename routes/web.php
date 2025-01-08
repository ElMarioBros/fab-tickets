<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Livewire\GameSelection;
use App\Livewire\SeatSelection;

//Route::get('/', fn() => 'Hola')->name('games.select');

Route::get('/', GameSelection::class)->name('games.select');
Route::get('/seats/{game}', SeatSelection::class)->name('seats.select');
Route::get('/reservation/success', function () {
    return view('reservation-success');
})->name('reservation.success');

Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/reservation/{reservation}', [AdminController::class, 'viewReservation'])
    ->middleware(['auth', 'verified'])
    ->name('reservation.view');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/serie-del-caribe', fn() => view('serie-del-caribe'));

require __DIR__.'/auth.php';
