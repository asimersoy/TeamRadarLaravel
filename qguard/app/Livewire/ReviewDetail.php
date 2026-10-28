<?php

namespace App\Livewire;

use App\Domain\Review\ReviewFeedback;
use App\Domain\Review\ReviewSession;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Locked;
use Livewire\Component;

class ReviewDetail extends Component
{
    #[Locked]
    public int $sessionId;

    public array $drafts = [];

    public string $reportTarget = '';

    public string $reportCategory = 'harmful_language';

    public string $reportNote = '';

    public function mount(int $session): void
    {
        $this->sessionId = $session;
        $this->authorizeSession();
    }

    private function authorizeSession(): object
    {
        abort_unless(auth()->check(), 403);

        return app(ReviewSession::class)->room(auth()->user(), $this->sessionId);
    }

    private function throttle(): void
    {
        $this->authorizeSession();
        $key = 'review-feedback:'.auth()->id();
        abort_if(RateLimiter::tooManyAttempts($key, 60), 429);
        RateLimiter::hit($key, 60);
    }

    public function sendCard(int $target): void
    {
        $this->throttle();
        app(ReviewFeedback::class)->submit(auth()->user(), $this->sessionId, $target, $this->drafts[$target] ?? []);
        unset($this->drafts[$target]);
        session()->flash('status', 'Rating submitted and locked.');
    }

    public function sendReport(): void
    {
        $this->throttle();
        app(ReviewFeedback::class)->report(auth()->user(), $this->sessionId, (int) $this->reportTarget, $this->reportCategory, $this->reportNote);
        $this->reportNote = '';
        session()->flash('status', 'Your private report is recorded. No automatic punishment is applied.');
    }

    public function admitLeaving(): void
    {
        $this->throttle();
        app(ReviewFeedback::class)->admit(auth()->user(), $this->sessionId);
        session()->flash('status', 'Your admission is recorded. Required feedback remains; future outgoing numerical effects are excluded.');
    }

    public function render()
    {
        $room = $this->authorizeSession();
        $cards = DB::table('review_feedback_cards as c')->join('session_participants as p', fn ($j) => $j->on('p.game_session_id', '=', 'c.game_session_id')->on('p.user_id', '=', 'c.recipient_id'))->where('c.game_session_id', $this->sessionId)->where('c.author_id', auth()->id())->orderBy('c.id')->get(['c.recipient_id', 'c.overall', 'c.communication', 'c.play_style', 'c.submitted_at', 'p.handle']);
        $roster = DB::table('session_participants')->where('game_session_id', $this->sessionId)->get(['user_id', 'handle', 'riot_id', 'rank_snapshot', 'honor_snapshot']);
        $excluded = app(ReviewFeedback::class)->exclusion($this->sessionId, auth()->id()) !== null;

        return view('livewire.review-detail', compact('room', 'cards', 'roster', 'excluded'))->layout('components.layout', ['title' => __('Session #:value1', ['value1' => $this->sessionId])]);
    }
}
