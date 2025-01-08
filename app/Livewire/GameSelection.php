<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;

class GameSelection extends Component
{
    public $games;

    public function mount()
    {
        $this->games = Game::orderBy('date')->get();
    }

    public function selectGame($gameId)
    {
        return redirect()->route('seats.select', ['game' => $gameId]);
    }

    public function render()
    {
        return view('livewire.game-selection');
    }
}
