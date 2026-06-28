<?php

namespace App\Services;

use App\Models\Game;
use App\Models\GameSet;

class VolleyballRules
{
    /**
     * Puntos necesarios para ganar el set.
     */
    public function targetPoints(Game $game, GameSet $set): int
    {
        // Mejor de 3 → el tercer set es a 15
        if ($game->sets_to_win == 2 && $set->set_number == 3) {
            return 15;
        }

        // Mejor de 5 → el quinto set es a 15
        if ($game->sets_to_win == 3 && $set->set_number == 5) {
            return 15;
        }

        return 25;
    }

    /**
     * Determina si existe un ganador del set.
     */
    public function hasWinner(Game $game, GameSet $set): bool
    {
        $target = $this->targetPoints($game, $set);

        if (
            $set->home_score >= $target &&
            ($set->home_score - $set->away_score) >= 2
        ) {
            return true;
        }

        if (
            $set->away_score >= $target &&
            ($set->away_score - $set->home_score) >= 2
        ) {
            return true;
        }

        return false;
    }
}