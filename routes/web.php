<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Trainer\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\TreinoController;
use App\Http\Controllers\ExercicioController;
use App\Http\Controllers\PlanoAlimentarController;
use App\Http\Controllers\MensagemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

/*
|--------------------------------------------------------------------------
| Página Inicial
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/

Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/support', 'support')->name('support');
Route::view('/community', 'community')->name('community');


/*
|--------------------------------------------------------------------------
| Rotas Protegidas (Auth)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::middleware('role:personal')->group(function () {
        /*
        |--------------------------------------------------------------------------
        | Gestão de Alunos
        |--------------------------------------------------------------------------
        */

        Route::resource('alunos', AlunoController::class);

        /*
        |--------------------------------------------------------------------------
        | Gestão de Personais
        |--------------------------------------------------------------------------
        */

        Route::resource('personais', PersonalController::class);
        Route::get('personais/{personal}/alunos', [PersonalController::class, 'alunos'])
            ->name('personais.alunos');

        /*
        |--------------------------------------------------------------------------
        | Gestão de Usuários
        |--------------------------------------------------------------------------
        */

        Route::resource('usuarios', UsuarioController::class);

        /*
        |--------------------------------------------------------------------------
        | Avaliações Físicas
        |--------------------------------------------------------------------------
        */

        Route::resource('avaliacoes', AvaliacaoController::class);

        /*
        |--------------------------------------------------------------------------
        | Treinos
        |--------------------------------------------------------------------------
        */

        Route::resource('treinos', TreinoController::class);

        /*
        |--------------------------------------------------------------------------
        | Exercícios
        |--------------------------------------------------------------------------
        */

        Route::resource('exercicios', ExercicioController::class);

        /*
        |--------------------------------------------------------------------------
        | Planos Alimentares
        |--------------------------------------------------------------------------
        */

        Route::resource('planos-alimentares', PlanoAlimentarController::class);

        /*
        |--------------------------------------------------------------------------
        | Mensagens
        |--------------------------------------------------------------------------
        */

        Route::resource('mensagens', MensagemController::class)->only(['index', 'show', 'store', 'destroy']);
        Route::patch('mensagens/{mensagem}/marcar-lida', [MensagemController::class, 'marcarComoLida'])
            ->name('mensagens.marcar-lida');

        /*
        |--------------------------------------------------------------------------
        | Funcionalidades do Dashboard (Legacy - Manter por compatibilidade)
        |--------------------------------------------------------------------------
        */

        Route::prefix('dashboard')
            ->name('dashboard.')
            ->group(function () {
                Route::get('/calendar', function () {
                    return redirect()
                        ->route('dashboard')
                        ->with('info', 'Calendar view coming soon');
                })->name('calendar');
            });

        /*
        |--------------------------------------------------------------------------
        | Workout Plans (Legacy - Redirecionar para nova rota)
        |--------------------------------------------------------------------------
        */

        Route::prefix('workout-plans')
            ->name('workout-plans.')
            ->group(function () {
                Route::get('/create', function () {
                    return redirect()->route('treinos.create');
                })->name('create');
            });

        /*
        |--------------------------------------------------------------------------
        | Clients (Legacy - Redirecionar para nova rota)
        |--------------------------------------------------------------------------
        */

        Route::prefix('clients')
            ->name('clients.')
            ->group(function () {
                Route::get('/', function () {
                    return redirect()->route('alunos.index');
                })->name('index');
            });

        /*
        |--------------------------------------------------------------------------
        | Reports
        |--------------------------------------------------------------------------
        */

        Route::get('/reports/generate', function () {
            return redirect()
                ->route('dashboard')
                ->with('info', 'Report generation coming soon');
        })->name('reports.generate');

        /*
        |--------------------------------------------------------------------------
        | Notifications
        |--------------------------------------------------------------------------
        */

        Route::prefix('notifications')
            ->name('notifications.')
            ->group(function () {
                Route::get('/', function () {
                    return redirect()->route('mensagens.index');
                })->name('index');
            });

        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

        Route::prefix('settings')
            ->name('settings.')
            ->group(function () {
                Route::get('/', function () {
                    return redirect()
                        ->route('dashboard')
                        ->with('info', 'Settings page coming soon');
                })->name('index');
            });

        /*
        |--------------------------------------------------------------------------
        | Activity
        |--------------------------------------------------------------------------
        */

        Route::get('/activity', function () {
            return redirect()
                ->route('dashboard')
                ->with('info', 'Activity log coming soon');
        })->name('activity.index');
    });
});


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
