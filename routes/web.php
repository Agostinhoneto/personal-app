<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Trainer\DashboardController;

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
    | Funcionalidades do Dashboard
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
    | Workout Plans
    |--------------------------------------------------------------------------
    */

    Route::prefix('workout-plans')
        ->name('workout-plans.')
        ->group(function () {

            Route::get('/create', function () {
                return redirect()
                    ->route('dashboard')
                    ->with('info', 'Create workout plan feature coming soon');
            })->name('create');

        });


    /*
    |--------------------------------------------------------------------------
    | Clients
    |--------------------------------------------------------------------------
    */

    Route::prefix('clients')
        ->name('clients.')
        ->group(function () {

            Route::get('/', function () {
                return redirect()
                    ->route('dashboard')
                    ->with('info', 'Clients list coming soon');
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
                return redirect()
                    ->route('dashboard')
                    ->with('info', 'Notifications center coming soon');
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

});


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';