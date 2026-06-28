<?php

namespace App\Services;

use App\Models\Game;
use App\Models\GameSet;

class ScoreService
{
    protected GameEventService $events;

    protected VolleyballRules $rules;

    public function __construct()
    {
        $this->events = app(GameEventService::class);
        $this->rules = app(VolleyballRules::class);
    }

    /**
     * Punto para el equipo local
     */
    public function pointHome(Game $game): GameSet
    {
        $game->refresh();

        if ($game->status === 'finished') {
            return $this->currentSet($game);
        }

        $set = $this->currentSet($game);

        $set->refresh();

        if ($set->winner_team_id !== null) {
            return $set;
        }

        // Cambio automático del saque
        if ($game->serving_team_id === $game->away_team_id) {

            $game->update([
                'serving_team_id' => $game->home_team_id,
            ]);

            $game->refresh();
        }

        $set->increment('home_score');

        $set->refresh();

        $this->events->point(
            $game,
            $set,
            $game->homeTeam
        );

        $this->finishSetIfNeeded($game, $set);

        return $this->currentSet($game);
    }

    /**
     * Punto para el equipo visita
     */
    public function pointAway(Game $game): GameSet
    {
        $game->refresh();

        if ($game->status === 'finished') {
            return $this->currentSet($game);
        }

        $set = $this->currentSet($game);

        $set->refresh();

        if ($set->winner_team_id !== null) {
            return $set;
        }

        // Cambio automático del saque
        if ($game->serving_team_id === $game->home_team_id) {

            $game->update([
                'serving_team_id' => $game->away_team_id,
            ]);

            $game->refresh();
        }

        $set->increment('away_score');

        $set->refresh();

        $this->events->point(
            $game,
            $set,
            $game->awayTeam
        );

        $this->finishSetIfNeeded($game, $set);

        return $this->currentSet($game);
    }

    /**
     * Tiempo muerto local
     */
    public function timeoutHome(Game $game): void
    {
        if ($game->status === 'finished') {
            return;
        }

        $set = $this->currentSet($game);

        $this->events->timeout(
            $game,
            $set,
            $game->homeTeam
        );
    }

    /**
     * Tiempo muerto visita
     */
    public function timeoutAway(Game $game): void
    {
        if ($game->status === 'finished') {
            return;
        }

        $set = $this->currentSet($game);

        $this->events->timeout(
            $game,
            $set,
            $game->awayTeam
        );
    }

    /**
     * Obtiene el set actual
     */
    protected function currentSet(Game $game): GameSet
    {
        return $game->sets()->firstOrCreate(
            [
                'set_number' => $game->current_set,
            ],
            [
                'home_score' => 0,
                'away_score' => 0,
            ]
        );
    }

    /**
     * Verifica si terminó el set
     */
    protected function finishSetIfNeeded(Game $game, GameSet $set): void
    {
        $set->refresh();

        if ($set->winner_team_id !== null) {
            return;
        }

        if (! $this->rules->hasWinner($game, $set)) {
            return;
        }

        $winner = $set->home_score > $set->away_score
            ? $game->home_team_id
            : $game->away_team_id;

        $set->update([
            'winner_team_id' => $winner,
            'finished_at'    => now(),
        ]);

        $homeSets = $game->sets()
            ->where('winner_team_id', $game->home_team_id)
            ->count();

        $awaySets = $game->sets()
            ->where('winner_team_id', $game->away_team_id)
            ->count();

        // Termina el partido según el formato elegido
        if (
            $homeSets >= $game->sets_to_win ||
            $awaySets >= $game->sets_to_win
        ) {

            $game->update([
                'status'   => 'finished',
                'ended_at' => now(),
            ]);

            return;
        }

        // Avanza al siguiente set
        $game->increment('current_set');

        $game->refresh();

        $game->sets()->firstOrCreate(
            [
                'set_number' => $game->current_set,
            ],
            [
                'home_score' => 0,
                'away_score' => 0,
            ]
        );
    }
}