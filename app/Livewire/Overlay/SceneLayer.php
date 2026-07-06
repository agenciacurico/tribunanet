<?php

namespace App\Livewire\Overlay;

use Livewire\Component;

class SceneLayer extends Component
{
    public bool $visible = true;

    public string $title = 'TRIBUNANET V2';

    public string $subtitle = 'Motor de escenas';

    public function render()
    {
        return view('livewire.overlay.scene-layer');
    }
}