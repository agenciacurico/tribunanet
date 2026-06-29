<?php

namespace App\Livewire;

use App\Services\MatchService;
use Livewire\Component;

class NewTransmission extends Component
{
    public int $step = 1;

    public ?int $homeTeam = null;

    public ?int $awayTeam = null;

    public string $venue = '';

    public ?string $coinWinner = null;

    public function nextStep(): void
    {
        if ($this->step < 4) {
            $this->step++;
        }
    }

    public function previousStep(): void
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function startGame(MatchService $matchService)
    {
        $game = $matchService->create([
            'home_team_id' => $this->homeTeam,
            'away_team_id' => $this->awayTeam,
            'venue'        => $this->venue,
            'serving_team' => $this->coinWinner,
        ]);

        return redirect()->route('operator.game', $game);
    }

    public function render()
    {
        return view('livewire.new-transmission', [
            'teams' => \App\Models\Team::orderBy('name')->get(),
        ]);
    }
}