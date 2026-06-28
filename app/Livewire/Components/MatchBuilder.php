<?php

namespace App\Livewire\Components;

use App\Models\Category;
use App\Models\Team;
use App\Services\MatchService;
use Livewire\Component;

class MatchBuilder extends Component
{
    public $home_team_id = '';

    public $away_team_id = '';

    public $category_id = '';

    public $venue = '';

    public $game_date = '';

    public $game_time = '';

    public $serving_team = 'home';

    /**
     * Inicializa el formulario.
     */
    public function mount(): void
    {
        $this->game_date = now()->format('Y-m-d');
        $this->game_time = now()->format('H:i');
    }

    /**
     * Inicia la transmisión.
     */
    public function startTransmission()
    {
        $this->validate([
            'home_team_id' => 'required|different:away_team_id',
            'away_team_id' => 'required|different:home_team_id',
            'venue'        => 'required|string|max:255',
            'game_date'    => 'required|date',
            'game_time'    => 'required',
        ]);

        $game = app(MatchService::class)->create([

            'category_id' => $this->category_id ?: null,

            'home_team_id' => $this->home_team_id,

            'away_team_id' => $this->away_team_id,

            'game_date' => $this->game_date,

            'game_time' => $this->game_time,

            'venue' => $this->venue,

            'serving_team' => $this->serving_team,

        ]);

        return redirect()->route('operator.game', $game);
    }

    public function render()
    {
        return view('livewire.components.match-builder', [

            'teams' => Team::with('club', 'category')
                ->orderBy('name')
                ->get(),

            'categories' => Category::orderBy('name')->get(),

        ]);
    }
}