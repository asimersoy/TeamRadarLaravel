<?php

namespace App\Livewire;

use App\Domain\Feedback\AdminReview;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCase extends Component
{
    use WithPagination;

    #[Locked]
    public int $caseId;

    #[Locked]
    public int $expectedVersion;

    public string $reviewStatus = 'reviewed';

    public string $note = '';

    public function mount(int $case): void
    {
        $this->authorizeAdmin();
        $row = DB::table('moderation_cases')->find($case);
        abort_unless($row, 404);
        $this->caseId = $case;
        $this->expectedVersion = $row->version;
        $this->note = $row->review_note ?? '';
    }

    private function authorizeAdmin(): void
    {
        abort_unless(auth()->check(), 403);
        app(AdminReview::class)->authorize(auth()->user());
    }

    public function saveReview(): void
    {
        $this->authorizeAdmin();
        app(AdminReview::class)->review(auth()->user(), $this->caseId, $this->expectedVersion, $this->reviewStatus, $this->note);
        $this->expectedVersion = DB::table('moderation_cases')->find($this->caseId)->version;
        session()->flash('status', 'Review saved. No player penalty, score or evidence was changed.');
    }

    public function render()
    {
        $this->authorizeAdmin();
        $case = DB::table('moderation_cases')->find($this->caseId);
        abort_unless($case, 404);
        app(AdminReview::class)->audit(auth()->user(), $this->caseId, 'case_view');
        $sessionId = $case->game_session_id;
        $players = DB::table('session_participants as p')->join('users as u', 'u.id', '=', 'p.user_id')->join('honor_states as h', 'h.user_id', '=', 'u.id')->where('p.game_session_id', $sessionId)->get(['p.*', 'u.email', 'u.email_verified_at', 'u.shard', 'u.language', 'u.stated_rank', 'u.competitive_access', 'h.honor_score', 'h.smoothed_raw_rating_reference', 'h.eligible_rating_count', 'h.calculation_version']);
        $submissions = DB::table('feedback_submissions')->where('game_session_id', $sessionId)->get();
        $ratings = DB::table('behavior_ratings')->whereIn('submission_id', $submissions->pluck('id'))->get();
        $reports = DB::table('conduct_reports')->where('game_session_id', $sessionId)->get();
        $observations = DB::table('rank_observations')->whereIn('submission_id', $submissions->pluck('id'))->get();
        $messages = DB::table('chat_messages')->where('game_session_id', $sessionId)->orderBy('id')->paginate(50);
        $settlement = DB::table('honor_settlements')->where('game_session_id', $sessionId)->first();
        $applications = $settlement ? DB::table('honor_applications')->where('settlement_id', $settlement->id)->orderBy('id')->get() : collect();
        $noShows = DB::table('no_show_requests')->where('game_session_id', $sessionId)->get();
        $votes = DB::table('no_show_votes')->whereIn('no_show_request_id', $noShows->pluck('id'))->get();

        return view('livewire.admin-case', compact('case', 'players', 'submissions', 'ratings', 'reports', 'observations', 'messages', 'settlement', 'applications', 'noShows', 'votes'))->layout('components.layout', ['title' => 'Case #'.$case->id]);
    }
}
