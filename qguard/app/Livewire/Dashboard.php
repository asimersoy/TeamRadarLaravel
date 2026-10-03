<?php

namespace App\Livewire;

use App\Domain\Game\Valorant;
use App\Domain\Matching\QueueService;
use App\Domain\Parties\MembershipTransaction;
use App\Domain\Parties\PartyService;
use App\Domain\Parties\SocialService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class Dashboard extends Component
{
    public string $riotId = '';

    public string $shard = 'eu';

    public string $language = 'en';

    public string $rank = '';

    public bool $competitiveAccess = false;

    public string $friendHandle = '';

    public string $inviteHandle = '';

    public string $partyShard = 'eu';

    public string $partyLanguage = 'en';

    public string $currentPassword = '';

    public string $newPassword = '';

    public string $newPasswordConfirmation = '';

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
        $this->riotId = $actor->riot_id ?? '';
        $this->shard = $actor->shard;
        $this->language = $actor->language;
        $this->rank = (string) $actor->stated_rank;
        $this->competitiveAccess = $actor->competitive_access;
        $party = app(PartyService::class)->current($actor);
        $this->partyShard = $party?->shard ?? $actor->shard;
        $this->partyLanguage = $party?->language ?? $actor->language;
    }

    public function saveProfile(): void
    {
        $this->throttle();
        $data = $this->validate(['riotId' => ['required', 'max:80', 'regex:/^.{3,50}#[a-zA-Z0-9]{3,5}$/u'], 'shard' => 'required|in:'.implode(',', array_keys(Valorant::SHARDS)), 'language' => 'required|in:'.implode(',', array_keys(Valorant::LANGUAGES)), 'rank' => 'nullable|integer|between:1,25', 'competitiveAccess' => 'boolean']);
        MembershipTransaction::run(function () use ($data) {
            $actor = $this->actor();
            DB::table('users')->where('id', $actor->id)->lockForUpdate()->first();
            $actor->forceFill(['riot_id' => $data['riotId'], 'shard' => $data['shard'], 'language' => $data['language'], 'stated_rank' => $data['rank'] ?: null, 'competitive_access' => $data['competitiveAccess']])->save();
            $parties = app(PartyService::class);
            if ($party = $parties->current($actor)) {
                $parties->cancelWaiting($party);
                $parties->clearReadiness($party->id);
            }
        });
        session()->flash('status', 'Declared profile saved. Party readiness was cleared. Game-account ownership and rank are not verified.');
    }

    public function changePassword(): void
    {
        $this->throttle();
        $this->validate(['currentPassword' => 'required|current_password', 'newPassword' => 'required|min:12|max:128|same:newPasswordConfirmation']);
        $this->actor()->forceFill(['password' => $this->newPassword])->save();
        DB::table('sessions')->where('user_id', $this->actor()->id)->where('id', '!=', session()->getId())->delete();
        $this->reset('currentPassword', 'newPassword', 'newPasswordConfirmation');
        session()->regenerate();
        session()->flash('status', 'Password changed. Other sessions were signed out.');
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
        $actor = $this->actor();
        $activeSession = DB::table('active_participations')->where('user_id', $actor->id)->value('game_session_id');
        if ($activeSession) {
            return view('livewire.matched', ['sessionId' => $activeSession])->layout('components.layout', ['title' => 'Team found']);
        }
        $party = app(PartyService::class)->current($actor);
        $friends = DB::table('friendships')->where(fn ($q) => $q->where('user_low', $actor->id)->orWhere('user_high', $actor->id))->whereIn('state', ['pending', 'accepted'])->get()->map(function ($f) use ($actor) {
            $f->handle = DB::table('users')->where('id', $f->user_low === $actor->id ? $f->user_high : $f->user_low)->value('handle');

            return $f;
        });
        $members = $party ? DB::table('party_memberships as m')->join('users as u', 'u.id', '=', 'm.user_id')->where('m.party_id', $party->id)->whereNull('m.left_at')->get(['u.id', 'u.handle', 'm.ready']) : collect();
        $invites = DB::table('party_invitations as i')->join('parties as p', 'p.id', '=', 'i.party_id')->join('users as u', 'u.id', '=', 'p.owner_id')->where('i.state', 'pending')->where(fn ($q) => $q->where('i.recipient_id', $actor->id)->orWhere('p.owner_id', $actor->id))->get(['i.id', 'i.recipient_id', 'u.handle']);

        return view('livewire.dashboard', compact('party', 'friends', 'members', 'invites') + ['honor' => DB::table('honor_states')->where('user_id', $actor->id)->value('honor_score'), 'ranks' => Valorant::ranks(), 'shards' => Valorant::SHARDS, 'languages' => Valorant::LANGUAGES])->layout('components.layout', ['title' => 'Your dashboard']);
    }

    public function enterQueue(): void
    {
        $this->throttle();
        app(QueueService::class)->enter($this->actor());
    }

    public function cancelQueue(): void
    {
        $this->throttle();
        app(QueueService::class)->cancel($this->actor());
    }
}
