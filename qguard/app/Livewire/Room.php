<?php

namespace App\Livewire;

use App\Domain\Game\UnavailableGamePartyHandoff;
use App\Domain\Game\Valorant;
use App\Domain\Review\ReviewSession;
use App\Domain\Sessions\SessionService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Room extends Component
{
    #[Locked]
    public int $sessionId;

    public string $partyCode = '';

    #[Locked]
    public int $codeVersion = 0;

    public function mount(int $session): void
    {
        $this->sessionId = $session;
        $this->participant();
        $this->codeVersion = (int) DB::table('party_code_versions')->where('game_session_id', $session)->max('version');
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
        app(ReviewSession::class)->due();
        $participant = $this->participant();
        $room = DB::table('game_sessions')->find($this->sessionId);
        if ($room->workflow_version === 'review-v2') {
            $code = DB::table('party_code_versions')->where('game_session_id', $this->sessionId)->orderByDesc('version')->first();
            $discrepancy = DB::table('lobby_discrepancies')->where(['game_session_id' => $this->sessionId, 'state' => 'pending'])->first();
            $canVote = $discrepancy && ! in_array(auth()->id(), [$discrepancy->reporter_id, $discrepancy->target_id]) && ! DB::table('lobby_discrepancy_votes')->where(['discrepancy_id' => $discrepancy->id, 'user_id' => auth()->id()])->exists();
            $endCount = DB::table('session_end_requests')->where('game_session_id', $this->sessionId)->count();
            $requestedEnd = DB::table('session_end_requests')->where(['game_session_id' => $this->sessionId, 'user_id' => auth()->id()])->exists();
            $noShow = DB::table('no_show_requests')->where('game_session_id', $this->sessionId)->whereIn('state', ['voting', 'responding'])->first();
            $roster = DB::table('session_participants')->where('game_session_id', $this->sessionId)->get(['user_id', 'handle', 'riot_id', 'rank_snapshot', 'honor_snapshot', 'state']);

            return view('livewire.review-room', compact('room', 'participant', 'code', 'discrepancy', 'canVote', 'endCount', 'requestedEnd', 'noShow', 'roster') + ['ranks' => Valorant::ranks()])->layout('components.layout', ['title' => 'Your team']);
        }

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
        if (DB::table('game_sessions')->find($this->sessionId)->workflow_version !== 'review-v2' || DB::table('game_sessions')->find($this->sessionId)->state !== 'active') {
            $this->redirectRoute('feedback', ['session' => $this->sessionId], navigate: true);
        }
    }

    public function vote(int $target): void
    {
        $this->throttle();
        $this->participant();
        app(SessionService::class)->vote(auth()->user(), $this->sessionId, $target);
    }

    public function saveCode(): void
    {
        $this->throttle();
        app(ReviewSession::class)->code(auth()->user(), $this->sessionId, $this->partyCode, $this->codeVersion);
        $this->codeVersion++;
        $this->partyCode = '';
        session()->flash('status', 'Party code shared with your team.');
    }

    public function dispute(int $target): void
    {
        $this->throttle();
        app(ReviewSession::class)->dispute(auth()->user(), $this->sessionId, $target);
    }

    public function corroborate(int $id, bool $mismatch): void
    {
        $this->throttle();
        app(ReviewSession::class)->corroborate(auth()->user(), $this->sessionId, $id, $mismatch);
    }

    public function refreshState(): void
    {
        $this->participant();
        app(ReviewSession::class)->due();
        $room = DB::table('game_sessions')->find($this->sessionId);
        if ($room->workflow_version === 'review-v2' && $room->state !== 'active') {
            $this->redirectRoute('session.detail', ['session' => $this->sessionId], navigate: true);
        }
    }

    protected function throttle(): void
    {
        $this->participant();
        $key = 'room-actions:'.auth()->id();
        abort_if(RateLimiter::tooManyAttempts($key, 60), 429);
        RateLimiter::hit($key, 60);
    }
}
