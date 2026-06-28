<?php

namespace App\Services;

use App\Models\Game;
use App\Models\GameEvent;
use App\Models\GameSet;
use App\Models\Team;

class GameEventService
{
    /**
     * Registrar punto
     */
    public function point(Game $game, GameSet $set, Team $team): GameEvent
    {
        return GameEvent::create([
            'game_id'      => $game->id,
            'game_set_id'  => $set->id,
            'team_id'      => $team->id,
            'event_type'   => 'point',
            'value'        => 1,
            'data'         => null,
        ]);
    }

    /**
     * Registrar tiempo muerto
     */
    public function timeout(Game $game, GameSet $set, Team $team): GameEvent
    {
        return GameEvent::create([
            'game_id'      => $game->id,
            'game_set_id'  => $set->id,
            'team_id'      => $team->id,
            'event_type'   => 'timeout',
            'value'        => 1,
            'data'         => [
                'requested_at' => now()->format('H:i:s'),
            ],
        ]);
    }

    /**
     * Registrar sustitución
     */
    public function substitution(Game $game, GameSet $set, Team $team, array $data = []): GameEvent
    {
        return GameEvent::create([
            'game_id'      => $game->id,
            'game_set_id'  => $set->id,
            'team_id'      => $team->id,
            'event_type'   => 'substitution',
            'value'        => 1,
            'data'         => $data,
        ]);
    }

    /**
     * Registrar tarjeta
     */
    public function card(Game $game, GameSet $set, Team $team, array $data = []): GameEvent
    {
        return GameEvent::create([
            'game_id'      => $game->id,
            'game_set_id'  => $set->id,
            'team_id'      => $team->id,
            'event_type'   => 'card',
            'value'        => 1,
            'data'         => $data,
        ]);
    }
}