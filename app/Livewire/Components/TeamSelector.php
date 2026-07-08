<?php

namespace App\Livewire\Components;

use App\Models\Team;
use Livewire\Component;

class TeamSelector extends Component
{
    public string $search = '';

    public ?int $selected = null;

    public function select(int $teamId): void
    {
        $this->selected = $teamId;

        $this->dispatch('teamSelected', id: $teamId);
    }

    public function render()
    {
        return view('livewire.components.team-selector', [

            'teams' => Team::with('club', 'category')
                ->when($this->search, function ($query) {

                    $query->where('name', 'like', "%{$this->search}%")
                        ->orWhereHas('club', function ($club) {

                            $club->where('name', 'like', "%{$this->search}%");

                        });

                })
                ->orderBy('name')
                ->limit(20)
                ->get(),

        ]);
    }
}