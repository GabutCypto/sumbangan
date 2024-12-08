<?php

use App\Http\Controllers\KirimController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\SumbanganController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
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

Route::middleware('auth')->group(function () {
    Route::resource('kirims', KirimController::class);
    Route::post('kirims/withdraw', [KirimController::class, 'withdraw'])->name('kirims.withdraw');
});

Route::resource('sumbangan', SumbanganController::class);
Route::resource('pembayaran', PembayaranController::class);
Route::resource('santri', SantriController::class);


require __DIR__.'/auth.php';