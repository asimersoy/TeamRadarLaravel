<?php

namespace App\Livewire;

use App\Domain\Game\UnavailableGamePartyHandoff;
use App\Domain\Game\Valorant;
use App\Domain\Sessions\SessionService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
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
        $participant = $this->participant();

        $noShow = DB::table('no_show_requests')->where('game_session_id', $this->sessionId)->whereIn('state', ['voting', 'responding'])->first();

        return view('livewire.room', compact('participant', 'noShow') + ['room' => DB::table('game_sessions')->find($this->sessionId), 'roster' => DB::table('session_participants')->where('game_session_id', $this->sessionId)->orderBy('id')->get(['user_id', 'handle', 'riot_id', 'rank_snapshot', 'rank_source', 'honor_snapshot', 'state']), 'ranks' => Valorant::ranks(), 'handoff' => (new UnavailableGamePartyHandoff)->status()])->layout('components.layout', ['title' => 'Your matched team']);
    }

    public function acknowledge(): void
    {
        $this->throttle();
        $this->participant();
        app(SessionService::class)->acknowledge(auth()->user(), $this->sessionId);
    }

    public function endSession(): void
    {
        $this->throttle();
        $this->participant();
        app(SessionService::class)->end(auth()->user(), $this->sessionId);
        $this->redirectRoute('feedback', ['session' => $this->sessionId]);
    }

    public function vote(int $target): void
    {
        $this->throttle();
        $this->participant();
        app(SessionService::class)->vote(auth()->user(), $this->sessionId, $target);
    }

    protected function throttle(): void
    {
        $this->participant();
        $key = 'room-actions:'.auth()->id();
        abort_if(RateLimiter::tooManyAttempts($key, 60), 429);
        RateLimiter::hit($key, 60);
    }
}
