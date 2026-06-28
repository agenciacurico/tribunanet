<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\Operator\GameOperator;
use App\Livewire\Overlay\GameOverlay;
use App\Livewire\NewTransmission;

Route::get('/new', NewTransmission::class)
    ->name('new.transmission');

Route::get('/', HomeController::class)
    ->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/operator/{game}', GameOperator::class)
    ->name('operator.game');

Route::get('/overlay/{game}', GameOverlay::class)
    ->name('overlay.game');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';