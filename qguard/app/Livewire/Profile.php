<?php

namespace App\Livewire;

use App\Domain\Game\Valorant;
use App\Domain\Parties\MembershipTransaction;
use App\Domain\Parties\PartyService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profile extends Component
{
    public string $handle = '';

    public string $riotId = '';

    public string $shard = 'eu';

    public string $language = 'en';

    public string $rank = '';

    public bool $competitiveAccess = false;

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
        $this->handle = $actor->handle;
        $this->riotId = $actor->riot_id ?? '';
        $this->shard = $actor->shard;
        $this->language = $actor->language;
        $this->rank = (string) $actor->stated_rank;
        $this->competitiveAccess = $actor->competitive_access;
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

    public function saveHandle(): void
    {
        $this->throttle();
        $this->handle = strtolower(trim($this->handle));
        $this->validate(['handle' => ['required', 'regex:/^[a-z0-9_]{3,24}$/', Rule::unique('users', 'handle')->ignore($this->actor()->id)]]);
        $this->actor()->forceFill(['handle' => $this->handle])->save();
        session()->flash('status', 'Public handle updated. Existing matched rosters keep their original snapshot.');
    }

    public function changePassword(): void
    {
        $this->throttle();
        $this->validate(['currentPassword' => 'required|current_password', 'newPassword' => 'required|min:12|max:128|same:newPasswordConfirmation']);
        $this->actor()->forceFill(['password' => $this->newPassword])->save();
        DB::table('sessions')->where('user_id', $this->actor()->id)->where('id', '!=', session()->getId())->delete();
        $this->reset('currentPassword', 'newPassword', 'newPasswordConfirmation');
        session()->regenerate(true);
        session()->flash('status', 'Password changed. Other sessions were signed out.');
        // The outer layout contains CSRF tokens; refresh it after token rotation.
        $this->redirectRoute('profile');
    }

    public function render()
    {
        $actor = $this->actor();

        return view('livewire.profile', [
            'honor' => DB::table('honor_states')->where('user_id', $actor->id)->value('honor_score'),
            'ranks' => Valorant::ranks(),
            'shards' => Valorant::SHARDS,
            'languages' => Valorant::LANGUAGES,
        ])->layout('components.layout', ['title' => 'Profile & settings']);
    }
}
