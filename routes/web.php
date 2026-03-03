<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Trainer\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Rotas que requerem autenticação
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard padrão (redireciona baseado no role)
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'trainer') {
            return redirect()->route('trainer.dashboard');
        }
        return view('dashboard');
    })->name('dashboard');
    
    // Rotas de perfil (usando o controller ProfileController)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rotas do Trainer
    
    Route::prefix('trainer')->name('trainer.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
    
});

require __DIR__.'/auth.php';