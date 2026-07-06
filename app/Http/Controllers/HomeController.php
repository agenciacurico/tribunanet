<?php

namespace App\Http\Controllers;

use App\Models\Game;

class HomeController extends Controller
{
    public function __invoke()
    {
        $liveGame = Game::with([
                'homeTeam',
                'awayTeam',
                'sets',
            ])
            ->where('status', 'live')
            ->latest()
            ->first();

        $nextGames = Game::with([
                'homeTeam',
                'awayTeam',
            ])
            ->where('status', 'scheduled')
            ->orderBy('game_date')
            ->orderBy('game_time')
            ->take(5)
            ->get();

        $finishedGames = Game::with([
                'homeTeam',
                'awayTeam',
            ])
            ->where('status', 'finished')
            ->latest('ended_at')
            ->take(5)
            ->get();

        return view('home', [
            'liveGame'      => $liveGame,
            'nextGames'     => $nextGames,
            'finishedGames' => $finishedGames,
        ]);
    }
}