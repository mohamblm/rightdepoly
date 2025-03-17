<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormationController;
use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream
=======
use App\Http\Controllers\DevisController;
use App\Http\Controllers\EishlistController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/etablissements', [EtablissementController::class, 'index'])->name('etablissements.index');
>>>>>>> Stashed changes

Route::get('/', function () {
    return view('welcome');
})->name('welcome');    


<<<<<<< Updated upstream
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

=======
// -------------------------------mohamed routes 
>>>>>>> Stashed changes

Route::get('/formations', [FormationController::class, 'index'])->name('formations');
Route::get('/formation/{id}', [FormationController::class, 'show'])->name('formation.show');

Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{formationId}', [WishlistController::class , 'addToCart'])->name('cart.add');
});
// ------------------------------------------------------------------


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
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{section}', [ProfileController::class, 'section'])->name('profile.section');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
