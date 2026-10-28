<?php

namespace App\Livewire;

use App\Domain\Feedback\AdminReview;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCases extends Component
{
    use WithPagination;

    public string $status = 'open';

    public string $filter = 'all';

    public function updated($property): void
    {
        if (in_array($property, ['status', 'filter'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        abort_unless(auth()->check(), 403);
        app(AdminReview::class)->audit(auth()->user(), null, 'inbox', ['status' => $this->status, 'filter' => $this->filter]);
        $q = DB::table('moderation_cases')->orderByDesc('id');
        if (in_array($this->status, ['open', 'reviewed'])) {
            $q->where('status', $this->status);
        }
        if ($this->filter === 'late') {
            $q->where('has_late_evidence', true);
        } elseif ($this->filter === 'automatic') {
            $q->where(fn ($r) => $r->whereNotNull('automatic_invalidations')->orWhereExists(fn ($a) => $a->selectRaw('1')->from('review_score_applications as a')->join('review_feedback_cards as c', 'c.id', '=', 'a.card_id')->whereColumn('c.game_session_id', 'moderation_cases.game_session_id')->whereNotNull('a.exclusion_reason')));
        } elseif ($this->filter === 'applied') {
            $q->where('has_late_evidence', true)->whereExists(fn ($s) => $s->selectRaw('1')->from('game_sessions')->whereColumn('game_sessions.id', 'moderation_cases.game_session_id')->where('workflow_version', 'review-v2'));
        } elseif (in_array($this->filter, ['early_leave', 'harmful_language', 'rank_discrepancy'])) {
            $q->where(function ($query) {
                $query->whereExists(fn ($r) => $r->selectRaw('1')->from('conduct_reports')->whereColumn('conduct_reports.game_session_id', 'moderation_cases.game_session_id')->where('category', $this->filter));
                if ($this->filter === 'rank_discrepancy') {
                    $query->orWhereExists(fn ($r) => $r->selectRaw('1')->from('lobby_discrepancies')->whereColumn('lobby_discrepancies.game_session_id', 'moderation_cases.game_session_id'));
                    $query->orWhereExists(fn ($r) => $r->selectRaw('1')->from('rank_observations as o')->join('feedback_submissions as s', 's.id', '=', 'o.submission_id')->whereColumn('s.game_session_id', 'moderation_cases.game_session_id')->where('o.observation', 'different'));
                }
            });
        }

        $cases = $q->paginate(25);
        $reportSummary = DB::table('conduct_reports as r')->join('session_participants as p', 'p.id', '=', 'r.target_participant_id')->whereIn('r.game_session_id', $cases->pluck('game_session_id'))->get(['r.game_session_id', 'p.handle', 'r.category', 'r.created_at', 'r.late'])->groupBy('game_session_id');
        $excludedSessions = DB::table('review_score_applications as a')->join('review_feedback_cards as c', 'c.id', '=', 'a.card_id')->whereIn('c.game_session_id', $cases->pluck('game_session_id'))->whereNotNull('a.exclusion_reason')->distinct()->pluck('c.game_session_id');

        return view('livewire.admin-cases', compact('cases', 'reportSummary', 'excludedSessions'))->layout('components.layout', ['title' => 'Human review']);
    }
}
