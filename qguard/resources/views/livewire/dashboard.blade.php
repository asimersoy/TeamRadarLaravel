<div wire:poll.5s>
<div class="page-heading"><div><p class="eyebrow">Your team hub · Valorant</p><h1>Welcome, {{ auth()->user()->handle }}</h1><p class="muted">Set up your profile. Bring friends, or start a solo party.</p></div><div class="score"><span>Your honor</span><strong>{{ number_format($honor, 1) }}</strong><small>Fixed neutral start · 0–100</small></div></div>
<x-errors />
<div class="dashboard-grid">
<section class="panel"><h2>Game profile</h2><p class="muted">Self-declared rank · game-account ownership unverified. No Riot account connection is active.</p>
<form wire:submit="saveProfile">
<label>Riot ID<input wire:model="riotId" placeholder="Player#TAG" maxlength="80" required></label>
<div class="form-grid"><label>Game shard<select wire:model="shard">@foreach($shards as $key=>$name)<option value="{{ $key }}">{{ $name }}</option>@endforeach</select></label><label>Communication language<select wire:model="language">@foreach($languages as $key=>$name)<option value="{{ $key }}">{{ $name }}</option>@endforeach</select></label></div>
<label>Declared Competitive rank<select wire:model="rank"><option value="">Unranked / unknown</option>@foreach($ranks as $key=>$name)<option value="{{ $key }}">{{ $name }}</option>@endforeach</select></label>
<label class="check"><input type="checkbox" wire:model="competitiveAccess">I can play Competitive on this account</label>
<button>Save game profile</button></form>
</section>
<section class="panel"><h2>Your party</h2>
@if(!$party)<p>You have no active party. Start one to play solo or invite friends.</p><button wire:click="createParty">Start a party</button>
@else
<p class="pill">{{ $party->state }} · {{ $members->count() }} / 5 players</p>
<ul class="roster">@foreach($members as $member)<li><strong>{{ $member->handle }} @if($member->id === $party->owner_id)<small>Leader</small>@endif</strong><span>{{ $member->ready ? 'Ready' : 'Not ready' }}</span></li>@endforeach</ul>
@if($party->owner_id === auth()->id())
<form wire:submit="savePartySettings"><div class="form-grid"><label>Party shard<select wire:model="partyShard">@foreach($shards as $key=>$name)<option value="{{ $key }}">{{ $name }}</option>@endforeach</select></label><label>Party language<select wire:model="partyLanguage">@foreach($languages as $key=>$name)<option value="{{ $key }}">{{ $name }}</option>@endforeach</select></label></div><button class="secondary">Save party settings</button></form>
<form wire:submit="invite"><label>Invite a friend by handle<input wire:model="inviteHandle" maxlength="24" required></label><button class="secondary">Send party invitation</button></form>
@endif
<div class="actions"><button wire:click="ready">I'm ready</button><button class="danger" wire:click="leaveParty">{{ $party->owner_id === auth()->id() ? 'Disband party' : 'Leave party' }}</button></div>
<p class="muted">Matchmaking will be enabled in the next verified stage. No game lobby is created here.</p>
@endif
@foreach($invites as $invite)<div class="list-row"><span>Invitation from {{ $invite->handle }}</span><div class="actions">@if($invite->recipient_id === auth()->id())<button wire:click="invitation({{ $invite->id }}, 'accept')">Accept invitation</button><button class="secondary" wire:click="invitation({{ $invite->id }}, 'decline')">Decline invitation</button>@else<button class="secondary" wire:click="invitation({{ $invite->id }}, 'revoke')">Revoke invitation #{{ $invite->id }}</button>@endif</div></div>@endforeach
</section>
<section class="panel"><h2>Friends</h2><form wire:submit="requestFriend"><label>Exact friend handle<input wire:model="friendHandle" maxlength="24" required></label><button>Send friend request</button></form>
@forelse($friends as $friend)<div class="list-row"><span>{{ $friend->handle }} <small>{{ $friend->state }}</small></span><div class="actions">@if($friend->state === 'accepted')<button class="secondary" wire:click="friendship({{ $friend->id }}, 'remove')">Remove friend</button>@elseif($friend->requester_id === auth()->id())<button class="secondary" wire:click="friendship({{ $friend->id }}, 'cancel')">Cancel request</button>@else<button wire:click="friendship({{ $friend->id }}, 'accept')">Accept friend</button><button class="secondary" wire:click="friendship({{ $friend->id }}, 'decline')">Decline friend</button>@endif</div></div>@empty<p class="muted">No friends yet. Send an exact handle request to get started.</p>@endforelse
</section>
<section class="panel"><h2>Account security</h2><form wire:submit="changePassword"><label>Current password<input type="password" wire:model="currentPassword" autocomplete="current-password" required></label><label>New password<input type="password" wire:model="newPassword" minlength="12" maxlength="128" autocomplete="new-password" required></label><label>Confirm new password<input type="password" wire:model="newPasswordConfirmation" autocomplete="new-password" required></label><button class="secondary">Change password</button></form></section>
</div>
</div>
