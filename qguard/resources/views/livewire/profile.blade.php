<div wire:cloak>
    <div class="page-heading">
        <div><p class="eyebrow">Your account · {{ auth()->user()->handle }}</p><h1>Profile &amp; settings</h1><p class="muted">Manage your identity, game profile and account security.</p></div>
        <div class="score"><span>Your honor</span><strong>{{ number_format($honor, 1) }}</strong><small>Fixed neutral start · 0–100</small></div>
    </div>
    <x-errors />
    <section class="panel private-summaries"><h2>How teammates describe you</h2><p class="muted">Visible only to you. These descriptions never affect honor or matching.</p>
    @foreach(['communication'=>['Communication','Quiet','Talkative'],'play_style'=>['Play style','Deliberate','Aggressive']] as $trait=>$labels)
    <div class="summary-scale"><h3>{{ $labels[0] }}</h3>@if($summaries[$trait]['value'] !== null)<meter min="0" max="100" value="{{ $summaries[$trait]['value'] }}" aria-label="{{ $labels[0] }} summary">{{ round($summaries[$trait]['value']) }}</meter><div class="range-labels"><span>{{ $labels[1] }}</span><span>{{ $labels[2] }}</span></div>@else<p class="muted">{{ $summaries[$trait]['status'] }}. Appears after three different eligible teammates contribute.</p>@endif</div>
    @endforeach</section>
    <nav class="profile-sections" aria-label="Profile sections"><a href="#game-profile">Game profile</a><a href="#public-profile">Public handle</a><a href="#account-security">Account security</a></nav>
    <div class="profile-grid">
        <section id="game-profile" class="panel">
            <p class="eyebrow">Valorant</p><h2>Game profile</h2>
            <p class="muted">Self-declared rank · game-account ownership unverified. No Riot account connection is active.</p>
            <form wire:submit="saveProfile">
                <label>Riot ID<input wire:model="riotId" placeholder="Player#TAG" maxlength="80" required></label>
                <div class="form-grid">
                    <label>Game shard<select wire:model="shard">@foreach($shards as $key=>$name)<option value="{{ $key }}">{{ $name }}</option>@endforeach</select></label>
                    <label>Communication language<select wire:model="language">@foreach($languages as $key=>$name)<option value="{{ $key }}">{{ $name }}</option>@endforeach</select></label>
                </div>
                <label>Declared Competitive rank<select wire:model="rank"><option value="">Unranked / unknown</option>@foreach($ranks as $key=>$name)<option value="{{ $key }}">{{ $name }}</option>@endforeach</select></label>
                <label class="check"><input type="checkbox" wire:model="competitiveAccess">I can play Competitive on this account</label>
                <p class="muted">Saving clears party readiness and cancels a waiting queue. Your existing matched roster stays unchanged.</p>
                <div class="actions"><button wire:loading.attr="disabled" wire:target="saveProfile">Save game profile</button><a href="{{ route('dashboard') }}">Back to matchmaking</a></div>
            </form>
        </section>
        <div class="account-panels">
            <section id="public-profile" class="panel"><h2>Public handle</h2><p class="muted">The name friends use to find you on QGuard.</p>
                <form wire:submit="saveHandle"><label>Public handle<input wire:model="handle" required minlength="3" maxlength="24"></label><button class="secondary" wire:loading.attr="disabled" wire:target="saveHandle">Save public handle</button></form>
            </section>
            <section id="account-security" class="panel"><h2>Account security</h2><p class="muted">Changing your password signs out your other QGuard sessions.</p>
                <form wire:submit="changePassword">
                    <label>Current password<input type="password" wire:model="currentPassword" autocomplete="current-password" required></label>
                    <label>New password<input type="password" wire:model="newPassword" minlength="12" maxlength="128" autocomplete="new-password" required></label>
                    <label>Confirm new password<input type="password" wire:model="newPasswordConfirmation" autocomplete="new-password" required></label>
                    <button class="secondary" wire:loading.attr="disabled" wire:target="changePassword">Change password</button>
                </form>
            </section>
        </div>
    </div>
</div>
