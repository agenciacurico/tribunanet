<?php

namespace App\Livewire\Overlay;

use App\Models\Game;
use App\Models\GameSet;
use Livewire\Component;

class GameOverlayV2 extends Component
{
    public Game $game;

    public GameSet $currentSet;

    public int $homeSets = 0;

    public int $awaySets = 0;

    public function mount(Game $game): void
    {
        $this->game = $game;
    }

    protected function loadGame(): void
    {
        $this->game->refresh();

        $this->currentSet = $this->game->sets()
            ->where('set_number', $this->game->current_set)
            ->firstOrCreate(
                ['set_number' => $this->game->current_set],
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

    public function render()
    {
        $this->loadGame();

        return view('livewire.overlay.game-overlay-v2')
            ->layout('components.layouts.overlay');
    }
}