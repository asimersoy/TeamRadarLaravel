<div wire:cloak>
    <div class="page-heading">
        <div><p class="eyebrow">{{ __('Your account · :value1', ['value1' => auth()->user()->handle]) }}</p><h1>{{ __('Profile & settings') }}</h1><p class="muted">{{ __('Manage your identity, game profile and account security.') }}</p></div>
        <div class="score"><span>{{ __('Your honor') }}</span><strong>{{ number_format($honor, 1) }}</strong><small>{{ __('Fixed neutral start · 0–100') }}</small></div>
    </div>
    <x-errors />
    <section class="panel private-summaries"><h2>{{ __('How teammates describe you') }}</h2><p class="muted">{{ __('Visible only to you. These descriptions never affect honor or matching.') }}</p>
    @foreach(['communication'=>['Communication','Quiet','Talkative'],'play_style'=>['Play style','Deliberate','Aggressive']] as $trait=>$labels)
    <div class="summary-scale"><h3>{{ __($labels[0]) }}</h3>@if($summaries[$trait]['value'] !== null)<meter min="0" max="100" value="{{ $summaries[$trait]['value'] }}" aria-label="{{ __(':value1 summary', ['value1' => __($labels[0])]) }}">{{ round($summaries[$trait]['value']) }}</meter><div class="range-labels"><span>{{ __($labels[1]) }}</span><span>{{ __($labels[2]) }}</span></div>@else<p class="muted">{{ __(':value1. Appears after three different eligible teammates contribute.', ['value1' => __($summaries[$trait]['status'])]) }}</p>@endif</div>
    @endforeach</section>
    <nav class="profile-sections" aria-label="{{ __('Profile sections') }}"><a href="#game-profile">{{ __('Game profile') }}</a><a href="#public-profile">{{ __('Public handle') }}</a><a href="#account-security">{{ __('Account security') }}</a></nav>
    <div class="profile-grid">
        <section id="game-profile" class="panel">
            <p class="eyebrow">Valorant</p><h2>{{ __('Game profile') }}</h2>
            <p class="muted">{{ __('Self-declared rank · game-account ownership unverified. No Riot account connection is active.') }}</p>
            <form wire:submit="saveProfile">
                <label>Riot ID<input wire:model="riotId" placeholder="{{ __('Player#TAG') }}" maxlength="80" required></label>
                <div class="form-grid">
                    <label>{{ __('Game shard') }}<select wire:model="shard">@foreach($shards as $key=>$name)<option value="{{ $key }}">{{ __($name) }}</option>@endforeach</select></label>
                    <label>{{ __('Communication language') }}<select wire:model="language">@foreach($languages as $key=>$name)<option value="{{ $key }}">{{ __($name) }}</option>@endforeach</select></label>
                </div>
                <label>{{ __('Declared Competitive rank') }}<select wire:model="rank"><option value="">{{ __('Unranked / unknown') }}</option>@foreach($ranks as $key=>$name)<option value="{{ $key }}">{{ __($name) }}</option>@endforeach</select></label>
                <label class="check"><input type="checkbox" wire:model="competitiveAccess">{{ __('I can play Competitive on this account') }}</label>
                <p class="muted">{{ __('Saving clears party readiness and cancels a waiting queue. Your existing matched roster stays unchanged.') }}</p>
                <div class="actions"><button wire:loading.attr="disabled" wire:target="saveProfile">{{ __('Save game profile') }}</button><a href="{{ route('dashboard') }}">{{ __('Back to matchmaking') }}</a></div>
            </form>
        </section>
        <div class="account-panels">
            <section id="public-profile" class="panel"><h2>{{ __('Public handle') }}</h2><p class="muted">{{ __('The name friends use to find you on QGuard.') }}</p>
                <form wire:submit="saveHandle"><label>{{ __('Public handle') }}<input wire:model="handle" required minlength="3" maxlength="24"></label><button class="secondary" wire:loading.attr="disabled" wire:target="saveHandle">{{ __('Save public handle') }}</button></form>
            </section>
            <section id="account-security" class="panel"><h2>{{ __('Account security') }}</h2><p class="muted">{{ __('Changing your password signs out your other QGuard sessions.') }}</p>
                <form wire:submit="changePassword">
                    <label>{{ __('Current password') }}<input type="password" wire:model="currentPassword" autocomplete="current-password" required></label>
                    <label>{{ __('New password') }}<input type="password" wire:model="newPassword" minlength="12" maxlength="128" autocomplete="new-password" required></label>
                    <label>{{ __('Confirm new password') }}<input type="password" wire:model="newPasswordConfirmation" autocomplete="new-password" required></label>
                    <button class="secondary" wire:loading.attr="disabled" wire:target="changePassword">{{ __('Change password') }}</button>
                </form>
            </section>
        </div>
    </div>
</div>
