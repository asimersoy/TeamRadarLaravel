<?php

namespace App\Livewire;

use App\Domain\Game\Valorant;
use App\Domain\Matching\QueueService;
use App\Domain\Parties\PartyService;
use App\Domain\Parties\SocialService;
use App\Domain\Review\MatchOffer;
use App\Domain\Review\RankConfirmation;
use App\Domain\Review\ReviewFeedback;
use App\Domain\Review\ReviewSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class Dashboard extends Component
{
    public string $confirmedRank = '';

    public string $friendHandle = '';

    public string $inviteHandle = '';

    public string $partyShard = 'eu';

    public string $partyLanguage = 'en';

    protected function actor()
    {
        abort_unless(Auth::check() && Auth::user()->hasVerifiedEmail(), 403);

        return Auth::user();
    }

    protected function throttle(): void
    {
        $key = 'dashboard:'.$this->actor()->id;
        abort_if(RateLimiter::tooManyAttempts($key, 60), 429);
        RateLimiter::hit($key, 60);
    }

    public function mount(): void
    {
        $actor = $this->actor();
        $party = app(PartyService::class)->current($actor);
        $this->partyShard = $party?->shard ?? $actor->shard;
        $this->partyLanguage = $party?->language ?? $actor->language;
    }

    public function requestFriend(): void
    {
        $this->throttle();
        app(SocialService::class)->request($this->actor(), $this->friendHandle);
        $this->friendHandle = '';
    }

    public function friendship(int $id, string $action): void
    {
        $this->throttle();
        app(SocialService::class)->respond($this->actor(), $id, $action);
    }

    public function createParty(): void
    {
        $this->throttle();
        app(PartyService::class)->create($this->actor());
    }

    public function leaveParty(): void
    {
        $this->throttle();
        app(PartyService::class)->leave($this->actor());
    }

    public function invite(): void
    {
        $this->throttle();
        app(PartyService::class)->invite($this->actor(), $this->inviteHandle);
        $this->inviteHandle = '';
    }

    public function inviteFriend(int $friendshipId): void
    {
        $this->throttle();
        $actor = $this->actor();
        $friendship = DB::table('friendships')->where('id', $friendshipId)->where('state', 'accepted')
            ->where(fn ($query) => $query->where('user_low', $actor->id)->orWhere('user_high', $actor->id))->first();
        abort_unless($friendship, 403);
        $friendId = $friendship->user_low === $actor->id ? $friendship->user_high : $friendship->user_low;
        $handle = DB::table('users')->where('id', $friendId)->value('handle');
        app(PartyService::class)->invite($actor, $handle);
        session()->flash('status', __('Party invitation sent to :handle.', ['handle' => $handle]));
    }

    public function invitation(int $id, string $action): void
    {
        $this->throttle();
        app(PartyService::class)->invitation($this->actor(), $id, $action);
    }

    public function ready(): void
    {
        $this->throttle();
        app(PartyService::class)->ready($this->actor());
    }

    public function savePartySettings(): void
    {
        $this->throttle();
        app(PartyService::class)->settings($this->actor(), $this->partyShard, $this->partyLanguage);
    }

    public function render()
    {
        app(MatchOffer::class)->due();
        app(ReviewSession::class)->due();
        $actor = $this->actor();
        $offer = app(MatchOffer::class)->current($actor);
        $acceptedCount = $offer ? DB::table('match_offer_members')->where(['offer_id' => $offer->id, 'accepted' => true])->count() : 0;
        $reviewDebt = app(ReviewFeedback::class)->debt($actor->id);
        $activeSession = DB::table('active_participations')->where('user_id', $actor->id)->value('game_session_id');
        $pendingFeedback = DB::table('session_participants as p')->join('game_sessions as g', 'g.id', '=', 'p.game_session_id')->leftJoin('feedback_submissions as f', 'f.participant_id', '=', 'p.id')->where('p.user_id', $actor->id)->where('p.state', 'ended')->where('g.state', 'active')->whereNull('g.settled_at')->whereNull('f.id')->where(fn ($q) => $q->whereNull('g.feedback_deadline')->orWhere('g.feedback_deadline', '>', now()))->orderBy('g.id')->limit(20)->pluck('g.id');
        $ownHonor = DB::table('honor_states')->where('user_id', $actor->id)->value('honor_score');
        $party = app(PartyService::class)->current($actor);
        $queueOutcome = $party ? DB::table('queue_entries')->where('party_id', $party->id)->orderByDesc('id')->value('state') : null;
        $friends = DB::table('friendships')->where(fn ($q) => $q->where('user_low', $actor->id)->orWhere('user_high', $actor->id))->whereIn('state', ['pending', 'accepted'])->get()->map(function ($f) use ($actor) {
            $f->handle = DB::table('users')->where('id', $f->user_low === $actor->id ? $f->user_high : $f->user_low)->value('handle');

            return $f;
        })->sortBy('handle');
        $members = $party ? DB::table('party_memberships as m')->join('users as u', 'u.id', '=', 'm.user_id')->where('m.party_id', $party->id)->whereNull('m.left_at')->get(['u.id', 'u.handle', 'm.ready']) : collect();
        $invites = DB::table('party_invitations as i')->join('parties as p', 'p.id', '=', 'i.party_id')->join('users as u', 'u.id', '=', 'p.owner_id')->where('i.state', 'pending')->where(fn ($q) => $q->where('i.recipient_id', $actor->id)->orWhere('p.owner_id', $actor->id))->get(['i.id', 'i.recipient_id', 'u.handle']);

        return view('livewire.dashboard', compact('party', 'friends', 'members', 'invites', 'pendingFeedback', 'activeSession', 'offer', 'acceptedCount', 'reviewDebt', 'queueOutcome') + ['honor' => $ownHonor, 'ranks' => Valorant::ranks(), 'shards' => Valorant::SHARDS, 'languages' => Valorant::LANGUAGES])->layout('components.layout', ['title' => 'Matchmaking']);
    }

    public function enterQueue(): void
    {
        $this->throttle();
        if ($id = DB::table('active_participations')->where('user_id', auth()->id())->value('game_session_id')) {
            $this->redirectRoute('room', ['session' => $id], navigate: true);

            return;
        }
        if ($id = app(ReviewFeedback::class)->debt(auth()->id())) {
            $this->redirectRoute('session.detail', ['session' => $id], navigate: true);

            return;
        }
        app(QueueService::class)->enter($this->actor());
    }

    public function confirmRank(): void
    {
        $this->throttle();
        app(RankConfirmation::class)->confirm($this->actor(), (int) $this->confirmedRank);
        session()->flash('status', 'Rank confirmed for your next queue attempt.');
    }

    public function respondOffer(int $offer, bool $accepted): void
    {
        $this->throttle();
        app(MatchOffer::class)->respond($this->actor(), $offer, $accepted);
        $this->refreshState();
    }

    public function refreshState(): void
    {
        $this->actor();
        app(MatchOffer::class)->due();
        $id = DB::table('active_participations')->where('user_id', auth()->id())->value('game_session_id');
        if ($id && DB::table('game_sessions')->where('id', $id)->value('workflow_version') === 'review-v2') {
            $this->redirectRoute('room', ['session' => $id], navigate: true);
        }
    }

    public function cancelQueue(): void
    {
        $this->throttle();
        app(QueueService::class)->cancel($this->actor());
    }
}
