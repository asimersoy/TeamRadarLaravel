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
            $q->whereNotNull('automatic_invalidations');
        } elseif (in_array($this->filter, ['early_leave', 'harmful_language', 'rank_discrepancy'])) {
            $q->where(function ($query) {
                $query->whereExists(fn ($r) => $r->selectRaw('1')->from('conduct_reports')->whereColumn('conduct_reports.game_session_id', 'moderation_cases.game_session_id')->where('category', $this->filter));
                if ($this->filter === 'rank_discrepancy') {
                    $query->orWhereExists(fn ($r) => $r->selectRaw('1')->from('rank_observations as o')->join('feedback_submissions as s', 's.id', '=', 'o.submission_id')->whereColumn('s.game_session_id', 'moderation_cases.game_session_id')->where('o.observation', 'different'));
                }
            });
        }

        return view('livewire.admin-cases', ['cases' => $q->paginate(25)])->layout('components.layout', ['title' => 'Human review']);
    }
}
