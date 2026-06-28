<?php

namespace App\Services;

use App\Models\Game;
use App\Models\GameEvent;

class GameUndoService
{
    public function undo(Game $game): void
    {
        // Buscar el último evento del partido
        $event = GameEvent::where('game_id', $game->id)
            ->latest()
            ->first();

        if (! $event) {
            return;
        }

        // Solo por ahora deshacemos puntos
        if ($event->event_type !== 'point') {
            return;
        }

        // Obtener el set correspondiente
        $set = $game->sets()
            ->where('set_number', $event->set_number)
            ->first();

        if (! $set) {
            return;
        }

        // Restar el punto
        if ($event->team_id == $game->home_team_id) {

            $set->home_score = max(0, $set->home_score - 1);

        } else {

            $set->away_score = max(0, $set->away_score - 1);

        }

        $set->save();

        // Eliminar el evento
        $event->delete();
    }
}