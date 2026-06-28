<?php

namespace App\Livewire;

use App\Models\Team;
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

    public function render()
    {
        return view('livewire.new-transmission', [
            'teams' => Team::orderBy('name')->get(),
        ]);
    }
}