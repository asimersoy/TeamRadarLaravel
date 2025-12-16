<?php

namespace App\Livewire;

use App\Models\Game;
use App\Models\GameAccount;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SetupGameAccount extends Component
{
    public $gameSlug;
    public $gameName;

    public $username;
    public $rank;

    public function mount($game)
    {
        $this->gameSlug = $game;

        // In a real app, we might fetch the game from DB here
        // For now, we assume it exists or will be created
        $this->gameName = ucfirst($this->gameSlug);
    }

    public function save()
    {
        $this->validate([
            'username' => 'required|string|max:255',
            'rank' => 'required|integer|min:0|max:25',
        ]);

        // Find or create the game
        $game = Game::firstOrCreate(
            ['slug' => $this->gameSlug],
            ['name' => $this->gameName]
        );

        // Create the linked account
        GameAccount::create([
            'user_id' => Auth::id(),
            'game_id' => $game->id,
            'game_username' => $this->username,
            'rank' => $this->rank,
            'verified_at' => now(), // Auto-verify for prototype
        ]);

        return redirect()->route('matchmaking');
    }

    public function render()
    {
        return view('livewire.setup-game-account');
    }
}
