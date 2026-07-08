<?php

namespace App\Livewire\Overlay;

use App\Models\Game;
use App\Models\GameSet;
use App\Models\TeamMember;
use Livewire\Component;

class GameOverlay extends Component
{
    public Game $game;

    public GameSet $currentSet;

    public int $homeSets = 0;

    public int $awaySets = 0;

    /**
     * Jugador cuya ficha se mostrará.
     */
    public ?TeamMember $featuredPlayer = null;

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

        /*
        |--------------------------------------------------------------------------
        | Ficha del jugador
        |--------------------------------------------------------------------------
        */

        $this->featuredPlayer = null;

        if (
            $this->game->featured_team_member_id &&
            $this->game->featured_until &&
            now()->lt($this->game->featured_until)
        ) {
            $this->featuredPlayer = TeamMember::with([
                'person',
                'team',
            ])->find($this->game->featured_team_member_id);
        }
    }

    public function render()
    {
        $this->loadGame();

        return view('livewire.overlay.game-overlay')
            ->layout('components.layouts.overlay');
    }
}