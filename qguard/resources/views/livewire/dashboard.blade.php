<div wire:cloak wire:poll.1s="refreshState">
    <div class="page-heading">
        <div><p class="eyebrow">Play together · Valorant</p><h1>Matchmaking</h1><p class="muted">Welcome, {{ auth()->user()->handle }}. Bring your friends, or find your five.</p></div>
        <div class="score"><span>Your honor</span><strong>{{ number_format($honor, 1) }}</strong><small>Fixed neutral start · 0–100</small></div>
    </div>
    <x-errors />
    @if($reviewDebt)<div class="notice"><strong>Finish your previous session feedback.</strong> <a wire:navigate href="{{ route('session.detail',$reviewDebt) }}">Open required ratings</a></div>@endif
    @if($offer)
    <div class="offer-backdrop" x-data x-init="$nextTick(() => $refs.accept?.focus())" x-trap.inert.noscroll="true"><section class="offer-dialog panel" role="dialog" aria-modal="true" aria-labelledby="offer-title">
    <p class="eyebrow">MATCH FOUND</p><h2 id="offer-title">Your five is waiting.</h2><p>All five players must accept within 20 seconds.</p><p class="offer-clock">{{ max(0, (int)ceil(now()->diffInSeconds(\Illuminate\Support\Carbon::parse($offer->deadline),false))) }} <small>seconds left</small></p><p>{{ $acceptedCount }} / 5 accepted</p>
    <p class="muted">If a member of your premade declines or misses the timer, your whole party stops searching and stays together.</p>
    <div class="actions"><button x-ref="accept" wire:click="respondOffer({{ $offer->id }},true)" @disabled($offer->accepted!==null)>Accept match</button><button class="secondary" wire:click="respondOffer({{ $offer->id }},false)" @disabled($offer->accepted!==null)>Decline</button></div>
    @if($offer->accepted!==null)<p role="status">Response recorded. Waiting for the other players or the deadline.</p>@endif</section></div>
    @endif
    @unless((\App\Support\ReviewVersion::historicalEngineEnabled() || \App\Support\ReviewVersion::reviewEngineEnabled()))
        <div class="notice">{{ \App\Support\ReviewVersion::QUEUE_MESSAGE }} <a href="{{ route('guest.review') }}#welcome">Explore as guest</a></div>
    @endunless
    <x-pending-feedback :sessions="$pendingFeedback" />
    <div class="matchmaking-layout">
        <div class="matchmaking-main">
            @if($activeSession)
                @include('livewire.matched', ['sessionId' => $activeSession, 'ownHonor' => $honor])
            @else
                <section class="queue-profile" aria-label="Your queue profile">
                    <div><p class="eyebrow">Competitive · No Discord voice</p><strong>{{ auth()->user()->riot_id ?: 'Set up your game profile' }}</strong><p class="muted">{{ $ranks[auth()->user()->stated_rank] ?? 'Unranked / unknown' }} · Self-declared · {{ $shards[auth()->user()->shard] }} · {{ $languages[auth()->user()->language] }}</p></div>
                    <a href="{{ route('profile') }}">Edit game profile</a>
                </section>
                @if(!auth()->user()->riot_id || !auth()->user()->stated_rank || !auth()->user()->competitive_access)
                    <div class="notice">Before getting ready, <a href="{{ route('profile') }}">complete your game profile</a> with a placed rank and Competitive access.</div>
                @endif
<section class="panel"><h2>Your party</h2>
@if(!$party)<p>You have no active party. Start one to play solo or invite friends.</p><button wire:click="createParty">Start a party</button>
@else
@if($queueOutcome === 'acceptance_failed')<div class="notice" role="status">Matchmaking stopped because someone in your party declined or did not accept in time. Your party is still together. Confirm your rank and get ready before trying again.</div>@endif
<p class="pill">{{ $party->state }} · {{ $members->count() }} / 5 players</p>
<ul class="roster">@foreach($members as $member)<li><strong>{{ $member->handle }} @if($member->id === $party->owner_id)<small>Leader</small>@endif</strong><span>{{ $member->ready ? 'Ready' : 'Not ready' }}</span></li>@endforeach</ul>
@if($party->owner_id === auth()->id())
<form wire:submit="savePartySettings"><div class="form-grid"><label>Party shard<select wire:model="partyShard">@foreach($shards as $key=>$name)<option value="{{ $key }}">{{ $name }}</option>@endforeach</select></label><label>Party language<select wire:model="partyLanguage">@foreach($languages as $key=>$name)<option value="{{ $key }}">{{ $name }}</option>@endforeach</select></label></div><button class="secondary">Save party settings</button></form>
<form wire:submit="invite"><label>Invite a friend by handle<input wire:model="inviteHandle" maxlength="24" required></label><button class="secondary">Send party invitation</button></form>
@endif
@if(\App\Support\ReviewVersion::reviewEngineEnabled() && $party->state === 'idle')
<form wire:submit="confirmRank"><label>Confirm rank for this queue attempt<select wire:model="confirmedRank" required><option value="">Choose current rank</option>@foreach($ranks as $key=>$name)<option value="{{ $key }}">{{ $name }}</option>@endforeach</select></label><p class="muted">Synthetic check · no official rank retrieved. Your declaration stays separate from observations.</p><button class="secondary">Confirm current rank</button></form>@endif
<div class="actions"><button wire:click="ready">I'm ready</button><button class="danger" wire:click="leaveParty">{{ $party->owner_id === auth()->id() ? 'Disband party' : 'Leave party' }}</button></div>
@if($party->owner_id === auth()->id())
@if($party->state === 'waiting')<div class="notice">Waiting for a compatible five. Honor preferences widen over time; shard and language never change.</div><button wire:click="cancelQueue" class="secondary">Cancel queue</button>
@else<div class="actions"><button wire:click="enterQueue" @disabled(!(\App\Support\ReviewVersion::historicalEngineEnabled() || \App\Support\ReviewVersion::reviewEngineEnabled()))>Find teammates</button></div>@endif
@endif
<p class="muted">No Discord voice queue yet. Original premade members cannot rate each other. A group of four searches for a fifth; QGuard never queues you into the game.</p>
@endif
@foreach($invites as $invite)<div class="list-row"><span>Invitation from {{ $invite->handle }}</span><div class="actions">@if($invite->recipient_id === auth()->id())<button wire:click="invitation({{ $invite->id }}, 'accept')">Accept invitation</button><button class="secondary" wire:click="invitation({{ $invite->id }}, 'decline')">Decline invitation</button>@else<button class="secondary" wire:click="invitation({{ $invite->id }}, 'revoke')">Revoke invitation #{{ $invite->id }}</button>@endif</div></div>@endforeach
</section>
            @endif
        </div>
        <x-friends-sidebar :friends="$friends" :party="$party" :members="$members" :active-session="$activeSession" />
    </div>
</div>
