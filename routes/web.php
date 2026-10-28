<?php

use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConcertController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntradaController;

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
    Route::get('/artistas', [ArtistaController::class, 'index'])->name('artistas.index');
    Route::get('/artistas/create', [ArtistaController::class, 'create'])->name('artistas.create');
    Route::post('/artistas', [ArtistaController::class, 'store'])->name('artistas.store');
    Route::get('/artistas/{artista}', [ArtistaController::class, 'show'])->name('artistas.show');
    Route::get('/artistas/{artista}/edit', [ArtistaController::class, 'edit'])->name('artistas.edit');
    Route::put('/artistas/{artista}', [ArtistaController::class, 'update'])->name('artistas.update');
    Route::delete('/artistas/{artista}', [ArtistaController::class, 'destroy'])->name('artistas.destroy');
    Route::get('/concerts', [ConcertController::class, 'index'])->name('concerts.index');
    Route::get('/concerts/create', [ConcertController::class, 'create'])->name('concerts.create');
    Route::post('/concerts', [ConcertController::class, 'store'])->name('concerts.store');
    Route::get('/concerts/{concert}', [ConcertController::class, 'show'])->name('concerts.show');
    Route::match(['put', 'post'], '/artistas/{artista}', [ArtistaController::class, 'update'])->name('artistas.update');
    Route::get('/mevesentrades', [EntradaController::class, 'mevesentrades'])
        ->name('entradas.meves');

    Route::get('/concerts/{concert}/entrades/create', [EntradaController::class, 'create'])
        ->name('entradas.create');

    Route::post('/concerts/{concert}/entrades', [EntradaController::class, 'store'])
        ->name('entradas.store');

    Route::get('/concerts/{concert}/assistents', [EntradaController::class, 'assistents'])
        ->name('entradas.assistants');
});

require __DIR__.'/auth.php';
