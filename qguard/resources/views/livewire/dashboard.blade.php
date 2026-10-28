<div wire:cloak wire:poll.1s.keep-alive="refreshState">
    <div class="page-heading">
        <div><p class="eyebrow">{{ __('Play together · Valorant') }}</p><h1>{{ __('Matchmaking') }}</h1><p class="muted">{{ __('Welcome, :value1. Bring your friends, or find your five.', ['value1' => auth()->user()->handle]) }}</p></div>
        <div class="score"><span>{{ __('Your honor') }}</span><strong>{{ number_format($honor, 1) }}</strong><small>{{ __('Fixed neutral start · 0–100') }}</small></div>
    </div>
    <x-errors />
    @if($reviewDebt)<div class="notice"><strong>{{ __('Finish your previous session feedback.') }}</strong> <a wire:navigate href="{{ route('session.detail',$reviewDebt) }}">{{ __('Open required ratings') }}</a></div>@endif
    @if($offer)
    <div class="offer-backdrop" x-data x-init="$nextTick(() => $refs.accept?.focus())" x-trap.inert.noscroll="true"><section class="offer-dialog panel" role="dialog" aria-modal="true" aria-labelledby="offer-title">
    <p class="eyebrow">{{ __('MATCH FOUND') }}</p><h2 id="offer-title">{{ __('Your five is waiting.') }}</h2><p>{{ __('All five players must accept within 20 seconds.') }}</p><p class="offer-clock">{{ max(0, (int)ceil(now()->diffInSeconds(\Illuminate\Support\Carbon::parse($offer->deadline),false))) }} <small>{{ __('seconds left') }}</small></p><p>{{ __(':value1 / 5 accepted', ['value1' => $acceptedCount]) }}</p>
    <p class="muted">{{ __('If a member of your premade declines or misses the timer, your whole party stops searching and stays together.') }}</p>
    <div class="actions"><button x-ref="accept" wire:click="respondOffer({{ $offer->id }},true)" @disabled($offer->accepted!==null)>{{ __('Accept match') }}</button><button class="secondary" wire:click="respondOffer({{ $offer->id }},false)" @disabled($offer->accepted!==null)>{{ __('Decline') }}</button></div>
    @if($offer->accepted!==null)<p role="status">{{ __('Response recorded. Waiting for the other players or the deadline.') }}</p>@endif</section></div>
    @endif
    @unless((\App\Support\ReviewVersion::historicalEngineEnabled() || \App\Support\ReviewVersion::reviewEngineEnabled()))
        <div class="notice">{{ __(\App\Support\ReviewVersion::QUEUE_MESSAGE) }} <a href="{{ route('guest.review') }}#welcome">{{ __('Explore as guest') }}</a></div>
    @endunless
    <x-pending-feedback :sessions="$pendingFeedback" />
    <div class="matchmaking-layout">
        <div class="matchmaking-main">
            @if($activeSession)
                @include('livewire.matched', ['sessionId' => $activeSession, 'ownHonor' => $honor])
            @else
                <section class="queue-profile" aria-label="{{ __('Your queue profile') }}">
                    <div><p class="eyebrow">{{ __('Competitive · No Discord voice') }}</p><strong>{{ auth()->user()->riot_id ?: __('Set up your game profile') }}</strong><p class="muted">{{ __(':value1 · Self-declared · :value2 · :value3', ['value1' => $ranks[auth()->user()->stated_rank] ?? __('Unranked / unknown'), 'value2' => __($shards[auth()->user()->shard]), 'value3' => __($languages[auth()->user()->language])]) }}</p></div>
                    <a href="{{ route('profile') }}">{{ __('Edit game profile') }}</a>
                </section>
                @if(!auth()->user()->riot_id || !auth()->user()->stated_rank || !auth()->user()->competitive_access)
                    <div class="notice">{{ __('Before getting ready,') }} <a href="{{ route('profile') }}">{{ __('complete your game profile') }}</a> {{ __('with a placed rank and Competitive access.') }}</div>
                @endif
<section class="panel"><h2>{{ __('Your party') }}</h2>
@if(!$party)<p>{{ __('You have no active party. Start one to play solo or invite friends.') }}</p><button wire:click="createParty">{{ __('Start a party') }}</button>
@else
@if($queueOutcome === 'acceptance_failed')<div class="notice" role="status">{{ __('Matchmaking stopped because someone in your party declined or did not accept in time. Your party is still together. Confirm your rank and get ready before trying again.') }}</div>@endif
<p class="pill">{{ __(':value1 · :value2 / 5 players', ['value1' => __($party->state), 'value2' => $members->count()]) }}</p>
<ul class="roster">@foreach($members as $member)<li><strong>{{ $member->handle }} @if($member->id === $party->owner_id)<small>{{ __('Leader') }}</small>@endif</strong><span>{{ __($member->ready ? 'Ready' : 'Not ready') }}</span></li>@endforeach</ul>
@if($party->owner_id === auth()->id())
<form wire:submit="savePartySettings"><div class="form-grid"><label>{{ __('Party shard') }}<select wire:model="partyShard">@foreach($shards as $key=>$name)<option value="{{ $key }}">{{ __($name) }}</option>@endforeach</select></label><label>{{ __('Party language') }}<select wire:model="partyLanguage">@foreach($languages as $key=>$name)<option value="{{ $key }}">{{ __($name) }}</option>@endforeach</select></label></div><button class="secondary">{{ __('Save party settings') }}</button></form>
<form wire:submit="invite"><label>{{ __('Invite a friend by handle') }}<input wire:model="inviteHandle" maxlength="24" required></label><button class="secondary">{{ __('Send party invitation') }}</button></form>
@endif
@if(\App\Support\ReviewVersion::reviewEngineEnabled() && $party->state === 'idle')
<form wire:submit="confirmRank"><label>{{ __('Confirm rank for this queue attempt') }}<select wire:model="confirmedRank" required><option value="">{{ __('Choose current rank') }}</option>@foreach($ranks as $key=>$name)<option value="{{ $key }}">{{ __($name) }}</option>@endforeach</select></label><p class="muted">{{ __('Synthetic check · no official rank retrieved. Your declaration stays separate from observations.') }}</p><button class="secondary">{{ __('Confirm current rank') }}</button></form>@endif
<div class="actions"><button wire:click="ready">{{ __('I\'m ready') }}</button><button class="danger" wire:click="leaveParty">{{ __($party->owner_id === auth()->id() ? 'Disband party' : 'Leave party') }}</button></div>
@if($party->owner_id === auth()->id())
@if($party->state === 'waiting')<div class="notice">{{ __('Waiting for a compatible five. Honor preferences widen over time; shard and language never change.') }}</div><button wire:click="cancelQueue" class="secondary">{{ __('Cancel queue') }}</button>
@else<div class="actions"><button wire:click="enterQueue" @disabled(!(\App\Support\ReviewVersion::historicalEngineEnabled() || \App\Support\ReviewVersion::reviewEngineEnabled()))>{{ __('Find teammates') }}</button></div>@endif
@endif
<p class="muted">{{ __('No Discord voice queue yet. Original premade members cannot rate each other. A group of four searches for a fifth; QGuard never queues you into the game.') }}</p>
@endif
@foreach($invites as $invite)<div class="list-row"><span>{{ __('Invitation from :value1', ['value1' => $invite->handle]) }}</span><div class="actions">@if($invite->recipient_id === auth()->id())<button wire:click="invitation({{ $invite->id }}, 'accept')">{{ __('Accept invitation') }}</button><button class="secondary" wire:click="invitation({{ $invite->id }}, 'decline')">{{ __('Decline invitation') }}</button>@else<button class="secondary" wire:click="invitation({{ $invite->id }}, 'revoke')">{{ __('Revoke invitation #:value1', ['value1' => $invite->id]) }}</button>@endif</div></div>@endforeach
</section>
            @endif
        </div>
        <x-friends-sidebar :friends="$friends" :party="$party" :members="$members" :active-session="$activeSession" />
    </div>
</div>
