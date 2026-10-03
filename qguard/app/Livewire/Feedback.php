<?php

namespace App\Livewire;

use App\Domain\Feedback\FeedbackService;
use App\Domain\Sessions\SessionService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Feedback extends Component
{
    #[Locked]
    public int $sessionId;

    public array $targets = [];

    public bool $admitted = false;

    public string $lateTarget = '';

    public string $lateCategory = 'harmful_language';

    public string $lateNote = '';

    public function mount(int $session): void
    {
        $this->sessionId = $session;
        $this->participant();
    }

    private function participant(): object
    {
        abort_unless(auth()->check(), 403);

        return app(SessionService::class)->participant(auth()->user(), $this->sessionId);
    }

    private function throttle(): void
    {
        $this->participant();
        $key = 'feedback:'.auth()->id();
        abort_if(RateLimiter::tooManyAttempts($key, 30), 429);
        RateLimiter::hit($key, 60);
    }

    public function finalize(): void
    {
        $this->throttle();
        app(FeedbackService::class)->finalize(auth()->user(), $this->sessionId, $this->targets, $this->admitted);
        $this->targets = [];
        session()->flash('status', 'Feedback finalized. Your submission is immutable; honor waits for settlement.');
    }

    public function skip(): void
    {
        $this->throttle();
        app(FeedbackService::class)->finalize(auth()->user(), $this->sessionId, [], false, true);
        $this->targets = [];
        session()->flash('status', 'Feedback skipped. No ratings were invented.');
    }

    public function sendLate(): void
    {
        $this->throttle();
        app(FeedbackService::class)->lateReport(auth()->user(), $this->sessionId, (int) $this->lateTarget, $this->lateCategory, $this->lateNote);
        $this->lateNote = '';
        session()->flash('status', 'Late evidence sent to human review. Settled honor was not changed.');
    }

    public function render()
    {
        $participant = $this->participant();
        $room = DB::table('game_sessions')->find($this->sessionId);
        $closed = $room->state !== 'active' || $room->settled_at || ($room->feedback_deadline && now()->gte(Carbon::parse($room->feedback_deadline)));
        $submitted = DB::table('feedback_submissions')->where(['game_session_id' => $this->sessionId, 'participant_id' => $participant->id])->exists();
        $roster = DB::table('session_participants')->where('game_session_id', $this->sessionId)->where('user_id', '!=', auth()->id())->orderBy('id')->get(['user_id', 'handle', 'origin_party_id', 'rank_snapshot']);

        return view('livewire.feedback', compact('participant', 'room', 'closed', 'submitted', 'roster'))->layout('components.layout', ['title' => 'Session feedback']);
    }
}
