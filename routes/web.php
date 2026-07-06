<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;
use App\Livewire\Operator\GameOperator;
use App\Livewire\Overlay\GameOverlay;
use App\Livewire\NewTransmission;

Route::get('/', HomeController::class)
    ->name('home');

Route::get('/game/{game}', [GameController::class, 'show'])
    ->name('game.show');

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::get('/overlay/{game}', GameOverlay::class)
    ->name('overlay.game');

   Route::get('/overlay-v2/{game}', \App\Livewire\Overlay\GameOverlayV2::class)
    ->name('overlay.game.v2'); 

/*
|--------------------------------------------------------------------------
| Rutas protegidas
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::view('dashboard', 'dashboard')
        ->middleware('verified')
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('/new', NewTransmission::class)
        ->name('new.transmission');

    Route::get('/operator/{game}', GameOperator::class)
        ->name('operator.game');

});

require __DIR__.'/auth.php';