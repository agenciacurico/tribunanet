<?php

namespace App\Http\Controllers;

use App\Models\Game;

class GameController extends Controller
{
    public function show(Game $game)
    {
        $game->load([
            'tournament',
            'category',
            'homeTeam',
            'awayTeam',
            'servingTeam',
            'sets',
            'events',
        ]);

        return view('game.show', [
            'game' => $game,
        ]);
    }
}