<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');    




Route::get('/formations', function () {
    return view('pages.formations.formations');
})->name('formations');

Route::get('/plans', function () {
    return view('pages.plans.plans');
})->name('plans');

Route::get('/about', function () {
    return view('pages.about.about');
})->name('about');

Route::get('/cart', function () {
    return view('pages.cart.cart');
})->name('cart');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
