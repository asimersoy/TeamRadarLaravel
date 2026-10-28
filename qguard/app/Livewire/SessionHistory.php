<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SessionHistory extends Component
{
    use WithPagination;

    public function render()
    {
        abort_unless(auth()->check() && auth()->user()->hasVerifiedEmail(), 403);
        $sessions = DB::table('game_sessions as g')->join('session_participants as p', 'p.game_session_id', '=', 'g.id')->where('p.user_id', auth()->id())->where('p.state', '!=', 'removed_no_show')->orderByDesc('g.id')->select('g.*')->paginate(12);
        $cards = DB::table('review_feedback_cards')->where('author_id', auth()->id())->whereIn('game_session_id', $sessions->pluck('id'))->get(['game_session_id', 'submitted_at'])->groupBy('game_session_id');
        $rosters = DB::table('session_participants')->whereIn('game_session_id', $sessions->pluck('id'))->get(['game_session_id', 'handle'])->groupBy('game_session_id');

        return view('livewire.session-history', compact('sessions', 'cards', 'rosters'))->layout('components.layout', ['title' => 'Session history']);
    }
}
