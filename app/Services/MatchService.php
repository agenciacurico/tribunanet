<?php

namespace App\Services;

use App\Models\Game;
use App\Models\GameSet;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class MatchService
{
    /**
     * Crear un nuevo partido listo para comenzar.
     */
    public function create(array $data): Game
    {
        return DB::transaction(function () use ($data) {

            $home = Team::findOrFail($data['home_team_id']);
            $away = Team::findOrFail($data['away_team_id']);

            $servingTeamId = match ($data['serving_team'] ?? 'home') {
                'away' => $away->id,
                default => $home->id,
            };

            $game = Game::create([

                'tournament_id'   => $data['tournament_id'] ?? null,

                'category_id'     => $data['category_id'] ?? $home->category_id,

                'home_team_id'    => $home->id,

                'away_team_id'    => $away->id,

                'game_date'       => $data['game_date'] ?? now()->toDateString(),

                'game_time'       => $data['game_time'] ?? now()->format('H:i'),

                'venue'           => $data['venue'] ?? '',

                'status'          => 'live',

                'current_set'     => 1,

                // NUEVO: cantidad de sets necesarios para ganar
                // 2 = Mejor de 3
                // 3 = Mejor de 5
                'sets_to_win'     => $data['sets_to_win'] ?? 3,

                'serving_team_id' => $servingTeamId,

            ]);

            GameSet::create([

                'game_id'     => $game->id,

                'set_number'  => 1,

                'home_score'  => 0,

                'away_score'  => 0,

            ]);

            return $game;
        });
    }
}