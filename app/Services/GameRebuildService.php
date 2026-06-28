<?php

namespace App\Services;

use App\Models\Game;
use App\Models\GameEvent;

class GameRebuildService
{
    public function rebuild(Game $game): void
    {
        // Reiniciar todos los sets
        foreach ($game->sets as $set) {

            $set->update([
                'home_score' => 0,
                'away_score' => 0,
                'winner_team_id' => null,
                'finished_at' => null,
            ]);
        }

        // Reiniciar partido
        $game->update([
            'current_set' => 1,
            'status' => 'live',
        ]);

        // Obtener todos los eventos en orden
        $events = GameEvent::where('game_id', $game->id)
            ->orderBy('id')
            ->get();

        // Reproducir todos los eventos
        foreach ($events as $event) {

            if ($event->event_type !== 'point') {
                continue;
            }

            $score = app(ScoreService::class);

            if ($event->team_id == $game->home_team_id) {

                $score->pointHome($game);

            } else {

                $score->pointAway($game);

            }
        }
    }
}