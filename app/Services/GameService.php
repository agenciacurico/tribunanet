<?php

namespace App\Services;

use App\Models\Game;
use App\Models\GameSet;

class GameService
{
    /**
     * Inicia un partido.
     */
    public function start(Game $game): Game
    {
        $game->update([
            'status' => 'live',
            'current_set' => 1,
        ]);

        GameSet::create([
            'game_id' => $game->id,
            'set_number' => 1,
            'started_at' => now(),
        ]);

        return $game->fresh();
    }

    /**
     * Obtiene el set actual.
     */
    public function currentSet(Game $game): GameSet
    {
        return $game->sets()
            ->where('is_finished', false)
            ->first();
    }
}