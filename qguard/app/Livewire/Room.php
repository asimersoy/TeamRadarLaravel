<?php

namespace App\Livewire;

use App\Domain\Game\UnavailableGamePartyHandoff;
use App\Domain\Game\Valorant;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Room extends Component
{
    #[Locked]
    public int $sessionId;

    public function mount(int $session): void
    {
        $this->sessionId = $session;
        $this->participant();
    }

    protected function participant(): object
    {
        abort_unless(auth()->check() && auth()->user()->hasVerifiedEmail(), 403);
        $p = DB::table('session_participants')->where(['game_session_id' => $this->sessionId, 'user_id' => auth()->id()])->first();
        abort_unless($p && $p->state !== 'removed_no_show', 403);

        return $p;
    }

    public function render()
    {
        $this->participant();

        return view('livewire.room', ['room' => DB::table('game_sessions')->find($this->sessionId), 'roster' => DB::table('session_participants')->where('game_session_id', $this->sessionId)->orderBy('id')->get(['user_id', 'handle', 'riot_id', 'rank_snapshot', 'rank_source', 'honor_snapshot', 'state']), 'ranks' => Valorant::ranks(), 'handoff' => (new UnavailableGamePartyHandoff)->status()])->layout('components.layout', ['title' => 'Your matched team']);
    }
}
