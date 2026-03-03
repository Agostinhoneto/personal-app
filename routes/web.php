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


// Rota principal - Dashboard do Trainer
Route::get('/', [DashboardController::class, 'trainer'])->name('dashboard.trainer');

// Rotas para ações do dashboard
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/calendar', function () {
        return redirect()->route('dashboard.trainer')->with('info', 'Calendar view coming soon');
    })->name('calendar');
});

// Rotas para funcionalidades principais
Route::prefix('workout-plans')->name('workout-plans.')->group(function () {
    Route::get('/create', function () {
        return redirect()->route('dashboard.trainer')->with('info', 'Create workout plan feature coming soon');
    })->name('create');
});

Route::prefix('clients')->name('clients.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard.trainer')->with('info', 'Clients list coming soon');
    })->name('index');
});

Route::get('/reports/generate', function () {
    return redirect()->route('dashboard.trainer')->with('info', 'Report generation coming soon');
})->name('reports.generate');

Route::prefix('notifications')->name('notifications.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard.trainer')->with('info', 'Notifications center coming soon');
    })->name('index');
});

Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard.trainer')->with('info', 'Settings page coming soon');
    })->name('index');
});

Route::get('/activity', function () {
    return redirect()->route('dashboard.trainer')->with('info', 'Activity log coming soon');
})->name('activity.index');

// Rotas institucionais
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/support', 'support')->name('support');
Route::view('/community', 'community')->name('community');

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

require __DIR__ . '/auth.php';
