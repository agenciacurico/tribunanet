<?php

namespace App\Livewire\Operator;

use App\Models\Game;
use App\Models\GameEvent;
use App\Models\GameSet;
use App\Services\ScoreService;
use Livewire\Component;

class GameOperator extends Component
{
    public Game $game;

    public GameSet $currentSet;

    public int $homeSets = 0;

    public int $awaySets = 0;

    public ?int $firstServeTeam = null;

    /**
     * Inicializa el operador.
     */
    public function mount(Game $game): void
    {
        $this->game = $game;

        $this->refreshGame();
    }

    /**
     * Iniciar partido.
     */
    public function startGame(): void
    {
        if ($this->firstServeTeam === null) {
            return;
        }

        $this->game->update([
            'status'          => 'live',
            'started_at'      => now(),
            'serving_team_id' => $this->firstServeTeam,
        ]);

        $this->refreshGame();
    }

    /**
     * Punto Local.
     */
    public function pointHome(): void
    {
        app(ScoreService::class)->pointHome($this->game);

        $this->refreshGame();
    }

    /**
     * Punto Visita.
     */
    public function pointAway(): void
    {
        app(ScoreService::class)->pointAway($this->game);

        $this->refreshGame();
    }

    /**
     * Tiempo muerto Local.
     */
    public function timeoutHome(): void
    {
        app(ScoreService::class)->timeoutHome($this->game);

        $this->refreshGame();
    }

    /**
     * Tiempo muerto Visita.
     */
    public function timeoutAway(): void
    {
        app(ScoreService::class)->timeoutAway($this->game);

        $this->refreshGame();
    }

    /**
     * Recargar estado del partido.
     */
    protected function refreshGame(): void
    {
        $this->game->refresh();

        $this->currentSet = $this->game->sets()->firstOrCreate(
            [
                'set_number' => $this->game->current_set,
            ],
            [
                'home_score' => 0,
                'away_score' => 0,
            ]
        );

        $this->homeSets = $this->game->sets()
            ->where('winner_team_id', $this->game->home_team_id)
            ->count();

        $this->awaySets = $this->game->sets()
            ->where('winner_team_id', $this->game->away_team_id)
            ->count();
    }

    /**
     * Renderizar componente.
     */
    public function render()
    {
        return view('livewire.operator.game-operator', [
            'events' => GameEvent::where('game_id', $this->game->id)
                ->with(['team', 'gameSet'])
                ->latest()
                ->take(20)
                ->get(),
        ]);
    }
}